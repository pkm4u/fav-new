<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\HasMany $Locations
 *
 * @method \App\Model\Entity\City get($primaryKey, $options = [])
 * @method \App\Model\Entity\City newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\City|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\City[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\City findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('cities');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
		
        $this->hasMany('Locations', [
            'foreignKey' => 'city_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('image');

        $validator
            ->integer('property_show_count')
            ->allowEmpty('property_show_count');

        $validator
            ->integer('builder_show_count')
            ->allowEmpty('builder_show_count');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->allowEmpty('meta_title');

        $validator
            ->allowEmpty('meta_keywords');

        $validator
            ->allowEmpty('meta_desc');

        $validator
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        $validator
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        $validator
            ->allowEmpty('polygon');

        $validator
            ->allowEmpty('polygon_center');

        $validator
            ->allowEmpty('home_page_des_title');

        $validator
            ->allowEmpty('home_page_description');

        $validator
            ->numeric('area')
            ->allowEmpty('area');

        $validator
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');

        $validator
            ->numeric('maxlat')
            ->allowEmpty('maxlat');

        $validator
            ->numeric('minlat')
            ->allowEmpty('minlat');

        $validator
            ->numeric('maxlon')
            ->allowEmpty('maxlon');

        $validator
            ->numeric('minlon')
            ->allowEmpty('minlon');

        $validator
            ->allowEmpty('polyform');

        $validator
            ->allowEmpty('poly_temp');

        $validator
            ->integer('priority')
            ->allowEmpty('priority');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
       // $rules->add($rules->existsIn(['state_id'], 'States'));

        return $rules;
    }
}
