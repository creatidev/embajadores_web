<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TUsuarios Model
 *
 * @method \App\Model\Entity\TUsuario newEmptyEntity()
 * @method \App\Model\Entity\TUsuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\TUsuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TUsuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TUsuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUsuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TUsuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUsuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUsuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TUsuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TUsuariosTable extends Table
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

        $this->setTable('t_usuarios');
        $this->setDisplayField('usu_nombre');
        $this->setPrimaryKey('id_usuario');

        $this->addBehavior('Timestamp');

        $this->hasOne('tRoles',[
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
            ->integer('id_usuario')
            ->allowEmptyString('id_usuario', null, 'create');

        $validator
            ->requirePresence('id_rol', 'create')
            ->allowEmptyString('id_rol');

        $validator
            ->requirePresence('usu_dni', 'create')
            ->minLength('usu_dni', 8,'Se requieren mínimo 8 dígitos')
            ->maxLength('usu_nombre', 10,'Se requieren máximo 10 dígitos')
            ->notEmptyString('usu_dni','Este campo es requerido');

        $validator
            ->scalar('usu_nombre')
            ->maxLength('usu_nombre', 50)
            ->requirePresence('usu_nombre', 'create')
            ->notEmptyString('usu_nombre','Este campo es requerido');

        $validator
            ->scalar('usu_apellidos')
            ->maxLength('usu_apellidos', 50)
            ->requirePresence('usu_apellidos', 'create')
            ->notEmptyString('usu_apellidos','Este campo es requerido');

        $validator
            ->email('usu_email',false, 'Direccion de correo electrónica, no válida.')
            ->requirePresence('usu_email', 'create')
            ->notEmptyString('usu_email', 'Este campo es requerido');

        $validator
            ->allowEmptyString('usu_celular');

        $validator
            ->scalar('usu_contrasena')
            ->minLength('usu_contrasena', 8, 'Se requieren mínimo 8 caracteres')
            ->maxLength('usu_contrasena', 100)
            ->requirePresence('usu_contrasena', 'create')
            ->notEmptyString('usu_contrasena', 'Este campo es requerido');

        $validator
            ->scalar('password')
            ->minLength('password', 8, 'Se requieren mínimo 8 caracteres')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'Este campo es requerido');

        $validator
            ->scalar('retype_password')
            ->requirePresence('retype_password', 'create')
            ->notEmptyString('retype_password', 'Este campo es requerido');

        $validator
            ->sameAs('retype_password', 'password','Los campos de contraseña no coinciden.');

        $validator
            ->allowEmptyString('usu_estado');

        $validator
            ->allowEmptyString('usu_eliminado');

        $validator
            ->dateTime('usu_fecha_creacion')
            ->notEmptyDateTime('usu_fecha_creacion');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['usu_email']), ['errorField' => 'usu_email','message'=>'Esta dirección de Email ya se encuentra registrada.']);
        $rules->add($rules->isUnique(['usu_dni']), ['errorField' => 'usu_dni','message'=>'El número de cedula ya se encuentra registrada.']);

        return $rules;
    }
}
