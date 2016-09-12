<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $ParentLocations
 * @property \Cake\ORM\Association\HasMany $ChildLocations
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocationsTable extends Table
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

        $this->table('locations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentLocations', [
            'className' => 'Locations',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildLocations', [
            'className' => 'Locations',
            'foreignKey' => 'parent_id'
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
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('parent_string', 'create')
            ->notEmpty('parent_string');

        $validator
            ->requirePresence('searchable_names', 'create')
            ->notEmpty('searchable_names');

        $validator
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->requirePresence('lon', 'create')
            ->notEmpty('lon');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->notEmpty('modified_by');

        $validator
            ->dateTime('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        $validator
            ->integer('deleted_by')
            ->requirePresence('deleted_by', 'create')
            ->notEmpty('deleted_by');

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
            ->numeric('area')
            ->allowEmpty('area');

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
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentLocations'));

        return $rules;
    }
}
