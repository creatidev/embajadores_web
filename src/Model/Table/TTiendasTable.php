<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TTiendas Model
 *
 * @method \App\Model\Entity\TTienda newEmptyEntity()
 * @method \App\Model\Entity\TTienda newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TTienda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TTienda get($primaryKey, $options = [])
 * @method \App\Model\Entity\TTienda findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TTienda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TTienda[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TTienda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TTienda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TTienda[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTienda[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTienda[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTienda[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TTiendasTable extends Table
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

        $this->setTable('t_tiendas');
        $this->setDisplayField('id_tienda');
        $this->setPrimaryKey('id_tienda');

        $this->hasOne('tCiudades',[
            'bindingKey'=>'id_ciudad',
            'foreignKey'=>'id_ciudad'
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
            ->allowEmptyString('id_tienda', null, 'create');

        $validator
            ->requirePresence('id_ciudad', 'create')
            ->notEmptyString('id_ciudad');

        $validator
            ->integer('id_usuario')
            ->allowEmptyString('id_usuario');

        $validator
            ->scalar('tie_nombre')
            ->maxLength('tie_nombre', 50)
            ->requirePresence('tie_nombre', 'create')
            ->notEmptyString('tie_nombre');

        $validator
            ->boolean('tie_estado_operacion')
            ->notEmptyString('tie_estado_operacion');

        $validator
            ->boolean('tie_estado')
            ->notEmptyString('tie_estado');

        $validator
            ->dateTime('tie_fecha_creacion')
            ->notEmptyDateTime('tie_fecha_creacion');

        return $validator;
    }
}
