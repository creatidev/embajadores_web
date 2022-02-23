<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TRoles Model
 *
 * @method \App\Model\Entity\TRole newEmptyEntity()
 * @method \App\Model\Entity\TRole newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\TRole findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TRole[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TRole|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TRole saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TRole[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TRole[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TRole[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TRole[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TRolesTable extends Table
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

        $this->setTable('t_roles');
        $this->setDisplayField('id_rol');
        $this->setPrimaryKey('id_rol');

        $this->hasOne('tUsuarios',[
            'foreignKey'=>'id_rol',
            'bindingKey'=>'id_rol',
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
            ->allowEmptyString('id_rol', null, 'create');

        $validator
            ->scalar('rol_nombre')
            ->maxLength('rol_nombre', 50)
            ->requirePresence('rol_nombre', 'create')
            ->notEmptyString('rol_nombre');

        $validator
            ->boolean('rol_estado')
            ->notEmptyString('rol_estado');

        $validator
            ->dateTime('rol_fecha_creacion')
            ->notEmptyDateTime('rol_fecha_creacion');

        return $validator;
    }
}
