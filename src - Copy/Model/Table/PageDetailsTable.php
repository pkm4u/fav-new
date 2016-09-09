<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WvPageDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentWvPageDetails
 * @property \Cake\ORM\Association\BelongsTo $PageTypes
 * @property \Cake\ORM\Association\BelongsTo $VillageTypes
 * @property \Cake\ORM\Association\HasMany $ChildWvPageDetails
 *
 * @method \App\Model\Entity\WvPageDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\WvPageDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WvPageDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WvPageDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WvPageDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WvPageDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WvPageDetail findOrCreate($search, callable $callback = null)
 */
class PageDetailsTable extends Table
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

        $this->table('wv_page_details');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('PageTypes', [
            'foreignKey' => 'page_type_id'
        ]);
        $this->belongsTo('VillageTypes', [
            'foreignKey' => 'village_type_id'
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
       return $rules;
    }
}
