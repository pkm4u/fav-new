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
	
}
