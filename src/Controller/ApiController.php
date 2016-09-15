<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
Use Cake\Event\Event;
use Cake\Filesystem\File;

/**
 * Villages Controller
 *
 * @property \App\Model\Table\VillagesTable $Villages
 */
class ApiController extends AppController
{
	public function initialize()
    {
        //parent::initialize();
		$this->viewBuilder()->layout('ajax');
		
    }
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function cities()
    {
		$cities = TableRegistry::get('Cities');
		$allCities=$cities->find()->select(['id','name'])->where(['is_deleted'=>0])->all();
		echo json_encode(['type'=>'success','cities'=>$allCities]);
		die;	
    }
	 public function locations($id=null)
    {
		if($id){
			$locations = TableRegistry::get('Locations');
			$allLocations=$locations->find()->select(['id','name'])->where(['city_id'=>$id,'is_deleted'=>0])->all();
			if($allLocations->toArray()){
				echo json_encode(['type'=>'success','locations'=>$allLocations]);
			}else{
				echo json_encode(['type'=>'success','locations'=>[['id'=>'','name'=>'NO location found.']]]);
			}
			
		}else{
			echo json_encode(['type'=>'success','locations'=>['name'=>'NO location found.']]);
		}
		die;	
    }
 public function amenities()
    {
			$amenities = TableRegistry::get('Amenities');
			$allAmenities=$amenities->find()->select(['id','name'])->where(['is_deleted'=>0])->all();
			echo json_encode(['type'=>'success','amenities'=>$allAmenities]);
		die;	
    }
	
	public function allProject($city)
    {
			/*$dsn = 'mysql://webszr1:NewADBs#@!@favista.com/favista';
			ConnectionManager::config('favista', ['url' => $dsn]);
			$connection = ConnectionManager::get('favista');
			$results = $connection->execute('SELECT id FROM fv_projects LIMIT 0,5')->fetchAll('assoc');*/
			if(empty($city) || $city=='undefined'){
				$city=1;
			}
		$projects=json_decode(file_get_contents('http://www.favista.com/cities/all_newlaunchprojects/'.$city),true);
			if($projects){
				foreach($projects as $key=>$pro){
					$data[]=array('display'=>$pro,'value'=>$key);
				}
			}
			echo json_encode(['type'=>'success','projects'=>$data]);
		die;	
    }
	public function projectDetails($city,$id)
    {
			if(empty($id) || $id=='undefined'){
				$id=1;
			}
		$project=json_decode(file_get_contents('http://www.favista.com/cities/all_newlaunchprojects/'.$city.'/'.$id),true);
			if($project){
				$data['lat']=$project['Project']['lat'];
				$data['long']=$project['Project']['lon'];
			}
			echo json_encode(['type'=>'success','project'=>$data]);
		die;	
    }
}
