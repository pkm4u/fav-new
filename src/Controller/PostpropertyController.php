<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
Use Cake\Event\Event;
use Cake\Controller\Component\CookieComponent;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PostpropertyController extends AppController
{
	
	public function initialize()
    {
        parent::initialize();
		
    }
	public function beforeFilter(Event $event)
	{
		$this->viewBuilder()->layout('postproperty');
		parent::beforeFilter($event);
		$this->Auth->allow(['index']);
		
	}

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	 public function index()
    {
		if(!$this->Auth->user()){
			$this->set('Login','True');
		}
		try{
		$projects=json_decode(file_get_contents('http://www.favista.com/cities/all_newlaunchprojects/1'),true);
			if($projects){
				foreach($projects as $key=>$pro){
					$data[]=array('display'=>$pro,'value'=>$key);
				}
			}
			$this->set('projects',json_encode($data));
		}catch(\Exception $e ){
			throw new NotFoundException();
		}
    }
	 public function loadviews($type)
    {
		$this->viewBuilder()->layout('ajax');
		$this->render($type);
		
    }
	
	
    public function saveinfo()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
	
	public function saveamenities()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
	public function savedetails()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
	public function saveaddress()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
	public function savepricing()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
	public function savephotos()
    {
		$this->request->data;
		$out['type']='success';
		echo json_encode($out);
	   die;
    }
}