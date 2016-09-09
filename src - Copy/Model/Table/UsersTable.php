<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
/**
 * WvUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserTypes
 *
 * @method \App\Model\Entity\WvUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\WvUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WvUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WvUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WvUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WvUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WvUser findOrCreate($search, callable $callback = null)
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
            'joinType' => 'INNER'
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
		->requirePresence([
				'name' => [
					'mode' => 'create',
					'message' => 'Name is required.'
				]])
          
        ->notEmpty('name','Name is required');

        $validator
		->requirePresence([
				'email' => [
					'mode' => 'create',
					'message' => 'Email is required.'
				]])
				
			->add('email', [
				'validformat' => [
					'rule' => 'email',
					'message' => 'E-mail must be valid.'
				],
				'unique' => [
					'rule' => 'validateUnique',
					 'provider' => 'table', 
					'message' => 'Email Id already exists.'
				]
			])
			
            
            ->notEmpty('email','Email is required');

        $validator
			->requirePresence([
				'password' => [
					'mode' => 'create',
					'message' => 'Password is required.'
				]])
				->add('password', [
					'minLength' => [
						'rule' => ['minLength', 8],
						'last' => true,
						'message' => 'Password must have 8 letters.'
					],
					'maxLength' => [
						'rule' => ['maxLength', 15],
						'message' => 'Password cannot be too long.'
					]
				])
            ->notEmpty('password','Password is required');
			
		$validator
			->requirePresence([
				'phone' => [
					'mode' => 'create',
					'message' => 'Mobile No. is required.'
				]])
				->add(
					'phone', 
					['unique' => [
						'rule' => 'validateUnique', 
						'provider' => 'table', 
						'message' => 'Phone No already exists']
					]
				)
            ->notEmpty('mobile','Mobile No. is required');
			
		$validator
			->requirePresence([
				'usertype' => [
					'mode' => 'create',
					'message' => 'Usertype is required.'
				]])
            ->notEmpty('usertype','UserType is required');
        $validator
            ->allowEmpty('status');

        $validator
            ->dateTime('created_date')
            ->allowEmpty('created_date');

        $validator
            ->allowEmpty('pass_reset_otp');

        $validator
            ->dateTime('pass_reset_date')
            ->allowEmpty('pass_reset_date');

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
        
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));
        return $rules;
    }
	
	public function findAuth(\Cake\ORM\Query $query, array $options)
	{
		$query->contain(['UserTypes']);
		return $query;
	}
}
