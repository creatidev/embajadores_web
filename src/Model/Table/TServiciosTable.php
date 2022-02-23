<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TServicios Model
 *
 * @method \App\Model\Entity\TServicio newEmptyEntity()
 * @method \App\Model\Entity\TServicio newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TServicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TServicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\TServicio findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TServicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TServicio[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TServicio|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TServicio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TServicio[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TServicio[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TServicio[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TServicio[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TServiciosTable extends Table
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

        $this->setTable('t_servicios');
        $this->setDisplayField('id_servicio');
        $this->setPrimaryKey('id_servicio');

        $this->hasMany('tComponentes',[
            'bindingKey'=>'id_servicio',
            'foreignKey'=>'id_servicio',
            'joinType'=>'INNER',
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
            ->allowEmptyString('id_servicio', null, 'create');

        $validator
            ->scalar('ser_nombre')
            ->maxLength('ser_nombre', 50)
            ->requirePresence('ser_nombre', 'create')
            ->notEmptyString('ser_nombre');

        $validator
            ->boolean('ser_estado')
            ->notEmptyString('ser_estado');

        $validator
            ->dateTime('ser_fecha_creacion')
            ->notEmptyDateTime('ser_fecha_creacion');

        return $validator;
    }
}
