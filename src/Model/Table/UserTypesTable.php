<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WvUserTypes Model
 *
 * @method \App\Model\Entity\WvUserType get($primaryKey, $options = [])
 * @method \App\Model\Entity\WvUserType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WvUserType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WvUserType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WvUserType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WvUserType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WvUserType findOrCreate($search, callable $callback = null)
 */
class UserTypesTable extends Table
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

        $this->table('user_types');
        $this->displayField('id');
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
            ->allowEmpty('type_name');

        $validator
            ->allowEmpty('role_type');

        $validator
            ->dateTime('created_date')
            ->allowEmpty('created_date');

        $validator
            ->dateTime('modify_date')
            ->allowEmpty('modify_date');

        return $validator;
    }
}
