<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Amenities Model
 *
 * @method \App\Model\Entity\Amenity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Amenity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Amenity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Amenity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Amenity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Amenity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Amenity findOrCreate($search, callable $callback = null)
 */
class AmenitiesTable extends Table
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

        $this->table('amenities');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->requirePresence('amenity_type', 'create')
            ->notEmpty('amenity_type');

        $validator
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        return $validator;
    }
}
