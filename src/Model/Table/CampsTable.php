<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Camps Model
 *
 * @property \Cake\ORM\Association\HasMany $Categories
 *
 * @method \App\Model\Entity\Camp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Camp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Camp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Camp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Camp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Camp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Camp findOrCreate($search, callable $callback = null)
 */
class CampsTable extends Table
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

        $this->table('camps');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'camp_id', 'dependent' => 'true', 'cascadeCallbacks' => 'true'
        ]);

        $this->hasMany('Users', [
          'foreignKey' => 'camp_id', 'dependent' => 'true', 'cascadeCallbacks' => 'true'
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
            ->numeric('lng')
            ->add('lng', 'valueMin', [
                'rule' => ['comparison', '>=', -180],
                'message' => 'The longitude has to be greater than -180° !'
            ])
            ->add('lng', 'valueMax', [
                'rule' => ['comparison', '<=', 180],
                'message' => 'The longitude has to be lesser than +180° !'
            ])
            ->requirePresence('lng', 'create')
            ->notEmpty('lng');

        $validator
            ->numeric('lat')
            ->add('lat', 'valueMin', [
                'rule' => ['comparison', '>=', -90],
                'message' => 'The latitude has to be greater than -90° !'
            ])
            ->add('lat', 'valueMax', [
                'rule' => ['comparison', '<=', 90],
                'message' => 'The latitude has to be lesser than +90° !'
            ])
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        return $validator;
    }
}
