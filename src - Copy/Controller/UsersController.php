<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; // 9990650660
use Cake\Cache\Cache; // 
Use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Utility\Text;
use Cake\Routing\Router;

/**
 * Villages Controller
 *
 * @property \App\Model\Table\VillagesTable $Villages
 */
class UsersController extends AppController
{
	public function initialize()
    {
        parent::initialize();
		
    }
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index','login','register','register','resetpassword','ajaxLogin','ajaxRegister','resetstepone','passwordreset','setnewpassword']);
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		
    }
	public function login()
    {
		$this->viewBuilder()->layout('ajax');
    }
	public function register()
	{
		$this->viewBuilder()->layout('ajax');
	}
	public function resetpassword()
	{
		$this->viewBuilder()->layout('ajax');
	}
	
	public function ajaxLogin()
	{
		$error=false;
		if(empty($this->request->data['username'])){
			$error=true;
			$out['type']='danger';
			$out['msg']['email']='Please enter username.';
		}
		if(empty($this->request->data['password'])){
			$error=true;
			$out['type']='danger';
			$out['msg']['password']='Please enter password.';
		}
		if($error){
			echo json_encode($out);	
		}else{
			
			$user = $this->Auth->identify();
			pr($user);
			if ($user) {
				$this->Auth->setUser($user);
				$out['type']='success';
				$out['msg'][]='Successfully login.';
				echo json_encode($out);	
			} else {
				$out['type']='danger';
				$out['msg'][]='Username or password is incorrect.';
				echo json_encode($out);	
			}
		}
		die;
	}
	
	
	public function ajaxRegister()
	{
		if($this->request->data){
		
			$users = TableRegistry::get('Users');
				
				$user = $users->newEntity();
				if ($this->request->is('post')) {
					$this->request->data['prefix']= $this->request->data['prefix']['value'];
				
					$user = $users->patchEntity($user, $this->request->data);
					
					if ($users->save($user)) {
						$out['type']='success';
						$out['msg'][]='Successfully Registered.';
						echo json_encode($out);	
					} else {
						$uerror =$user->errors();
						$out=[];
						if($uerror){
							foreach($uerror as $key=>$value){
								foreach($value as $err){
									$out['type']='danger';
									$out['msg'][$key]=$err;
								}
							}
						}
						
						
						$out['type']='danger';
						$out['msg'][]='Data is not correct.';
						echo json_encode($out);	
					}
				}
			
		}
		die;
	}
		
	
	
	
	public function resetstepone()
	{
		//pr($this->request->data);
		$users = TableRegistry::get('Users');
		if(empty($this->request->data['username']) || empty($this->request->data)){
			$out['type']='danger';
			$out['msg'][]='Please enter username or email address.';
			echo json_encode($out);	
		}else{
		$userData= $users->find()->where(['email' => $this->request->data['username']])->first();
			if(empty($userData)){
				$out['type']='danger';
				$out['msg'][]='Username/Email is incorect, Please try again.';
				echo json_encode($out);	
				
			}else{
				$userData=$userData->toArray();
				//$this->Mail->sendmail();
				$userNewdata=$users->get($userData['id']);
				$authToken=Text::uuid();
				$data['pass_reset_auth_token']=$authToken;
				$users->patchEntity($userNewdata, $data, ['validate' => false]);
				//pr($userNewdata);
				if($users->save($userNewdata)){
					$url=Router::url('/',true).'passwordreset/'.$authToken;
					$mailData['viewVars']=['link'=>$url,'name'=>$userNewdata['username']];
					$mailData['template']='forgotpass';
					$mailData['toemail']=$userNewdata['email'];
					$mailData['subject']='Reset Password';
					//$this->SendMail->sendmail($mailData);
					$out['type']='success';
					$out['msg'][]='A password reset link send on your email.';
					echo json_encode($out);	
					
				}
			}
		}
		die;
	}
	
	public function setnewpassword()
	{
		$authToken=$this->request->session()->read('resetAuth');
		if($authToken){
			$error=false;
			if(empty($this->request->data['password'])){
				$error=true;
				$out['type']='danger';
				$out['msg'][]='Please enter new password.';
			}
			if(empty($this->request->data['repassword'])){
				$error=true;
				$out['type']='danger';
				$out['msg'][]='Please re-enter new password.';
			}
			if($this->request->data['password'] !== $this->request->data['repassword']){
				$error=true;
				$out['type']='danger';
				$out['msg'][]='Password does not matched.';
			}
			if($error){
				echo json_encode($out);
			}else{
				$users = TableRegistry::get('Users');
				$data= $users->find()->where(['pass_reset_auth_token' =>$authToken])->first();
				if($data){
					$data->password=$this->request->data['password'];
					$data->pass_reset_auth_token=NULL;
					$data->pass_reset_date=strtotime(date('Y-m-d H:i:s'));
					$users->patchEntity($data, ['validate' => false]);
					if($users->save($data)){
						$this->request->session()->delete('resetAuth');
						$out['type']='success';
						$out['msg'][]='Password successfuly updated.';
						echo json_encode($out);
					}else{
						$out['type']='danger';
						$out['msg'][]='A internal error.';
						echo json_encode($out);
					}
				}else{
					$out['type']='danger';
					$out['msg'][]='A internal error, please try again.';
					$this->request->session()->delete('resetAuth');
					echo json_encode($out);
				}
			}
		}else{
			$out['type']='danger';
			$out['msg'][]='Auth Token has expired, please try again.';
			$this->request->session()->delete('resetAuth');
			echo json_encode($out);
		}
		die;
	}
	
	public function passwordreset($authToken)
	{
		if($authToken){
			$this->request->session()->write('resetAuth',$authToken);
			$this->redirect(['controller' => 'Home','action' => 'index']);
		}
		$this->redirect(['controller' => 'Home','action' => 'index']);
	}
	
	public function logout(){
		$this->Auth->logout();
		 $this->redirect([
			'controller' => 'Home',
			'action' => 'index'
		]);
	}
}
