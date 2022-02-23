<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TComponentes Model
 *
 * @method \App\Model\Entity\TComponente newEmptyEntity()
 * @method \App\Model\Entity\TComponente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TComponente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TComponente get($primaryKey, $options = [])
 * @method \App\Model\Entity\TComponente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TComponente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TComponente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TComponente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TComponente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TComponente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TComponente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TComponente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TComponente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TComponentesTable extends Table
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

        $this->setTable('t_componentes');
        $this->setDisplayField('id_componente');
        $this->setPrimaryKey('id_componente');

        $this->hasOne('tServicios',[
            'bindingKey'=>'id_servicio',
            'foreignKey'=>'id_servicio',
            'joinType'=>'INNER'
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
            ->allowEmptyString('id_componente', null, 'create');

        $validator
            ->requirePresence('id_servicio', 'create')
            ->notEmptyString('id_servicio');

        $validator
            ->scalar('com_nombre')
            ->maxLength('com_nombre', 50)
            ->requirePresence('com_nombre', 'create')
            ->notEmptyString('com_nombre');

        $validator
            ->boolean('com_estado')
            ->notEmptyString('com_estado');

        $validator
            ->dateTime('com_fecha_creacion')
            ->notEmptyDateTime('com_fecha_creacion');

        return $validator;
    }
}
