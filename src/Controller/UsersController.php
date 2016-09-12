<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
Use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Utility\Text;
use Cake\Routing\Router;
use Cake\Controller\Component\CookieComponent;

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
		$this->Auth->allow(['index','login','register','register','resetpassword','ajaxLogin','ajaxRegister','resetstepone','passwordreset','setnewpassword','activation']);
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
		//pr($this->Cookie->read('Remember'));
		
    }
	public function register()
	{
		$this->viewBuilder()->layout('ajax');
	}
	public function activation()
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
		if(empty($this->request->data['email'])){
			$error=true;
			$out['type']='danger';
			$out['msg']['email']='Please enter email.';
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
			if ($user){
				$this->Auth->setUser($user);
				$out['type']='success';
				$out['msg']['sucess']='Successfully login.';
				$out['user']=$this->Auth->user();
				if(isset($this->request->data['remember'])){
					$this->Cookie->write('Remember', $this->request->data, true);
				}
				
				echo json_encode($out);	
				
			} else {
				$out['type']='danger';
				$out['msg']['error']='Username or password is incorrect.';
				echo json_encode($out);	
			}
		}
		die;
	}
	
	
	public function ajaxActivate(){
			
		if(empty($this->request->data['code'])){
			$error=true;
			$out['type']='danger';
			$out['msg']['code']='Please enter code.';
			echo json_encode($out);	
		}else{
			$users = TableRegistry::get('Users');
			$userData= $users->get($this->request->data['id']);;
			if($this->request->data['code']==$userData['register_otp']){
				$data['verification_by_phone']='1';
				$user = $users->patchEntity($userData, $data, ['validate' => false]);
				$users->save($user);
				$authUser = $users->get($this->request->data['id'])->toArray();
				
				$this->Auth->setUser($authUser);
				$this->redirect(['action' => 'account']);
			}else{
				$out['type']='danger';
				$out['msg']['code']='Code doesnot match.';
				echo json_encode($out);	
			}
		}
	}
	
	public function ajaxRegister()
	{
		if($this->request->data){
		
			$users = TableRegistry::get('Users');
				$userdetails = TableRegistry::get('UserDetails');
				$user = $users->newEntity();
				if ($this->request->is('post')) {
					$this->request->data['prefix']= $this->request->data['prefix']['value'];
					$this->request->data['user_type_id']= $this->request->data['usertype'];
					$pin = mt_rand(1000, 9999);
					$this->request->data['register_otp']=$pin;
					$user = $users->patchEntity($user, $this->request->data);
					
					if ($us = $users->save($user)) {
						$this->request->data['user_id']=$us->id;
						
						$userdetail = $userdetails->newEntity();
						$userdetail = $userdetails->patchEntity($userdetail, $this->request->data);
						$userdetails->save($userdetail);
						$out['type']='success';
						$out['email']= $this->request->data['email'];
						$out['phone']= $this->request->data['phone'];
						$out['prefix']= $this->request->data['prefix'];
						$out['id']= $us->id;
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
			'controller' => 'Postproperty',
			'action' => 'index'
		]);
	}
}
