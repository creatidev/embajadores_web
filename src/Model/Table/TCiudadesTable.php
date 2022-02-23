<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TCiudades Model
 *
 * @method \App\Model\Entity\TCiudad newEmptyEntity()
 * @method \App\Model\Entity\TCiudad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TCiudad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TCiudad get($primaryKey, $options = [])
 * @method \App\Model\Entity\TCiudad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TCiudad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TCiudad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TCiudad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TCiudad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TCiudad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TCiudad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TCiudad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TCiudad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TCiudadesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('t_ciudades');
        $this->setDisplayField('id_ciudad');
        $this->setPrimaryKey('id_ciudad');

        $this->hasMany('tTiendas',[
            'bindingKey'=>'id_ciudad',
            'foreignKey'=>'id_ciudad',
            'dependent'=>true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('id_ciudad', null, 'create');

        $validator
            ->scalar('ciu_nombre')
            ->maxLength('ciu_nombre', 50)
            ->requirePresence('ciu_nombre', 'create')
            ->notEmptyString('ciu_nombre');

        $validator
            ->boolean('ciu_estado')
            ->notEmptyString('ciu_estado');

        $validator
            ->dateTime('ciu_fecha_creacion')
            ->notEmptyDateTime('ciu_fecha_creacion');

        return $validator;
    }
}
