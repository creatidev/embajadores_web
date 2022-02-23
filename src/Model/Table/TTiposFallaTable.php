<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TTiposFalla Model
 *
 * @method \App\Model\Entity\TTiposFalla newEmptyEntity()
 * @method \App\Model\Entity\TTiposFalla newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TTiposFalla[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TTiposFalla get($primaryKey, $options = [])
 * @method \App\Model\Entity\TTiposFalla findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TTiposFalla patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TTiposFalla[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TTiposFalla|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TTiposFalla saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TTiposFalla[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTiposFalla[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTiposFalla[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TTiposFalla[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TTiposFallaTable extends Table
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

        $this->setTable('t_tipos_falla');
        $this->setDisplayField('id_tipo_falla');
        $this->setPrimaryKey('id_tipo_falla');
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
            ->allowEmptyString('id_tipo_falla', null, 'create');

        $validator
            ->scalar('tpf_nombre')
            ->maxLength('tpf_nombre', 50)
            ->requirePresence('tpf_nombre', 'create')
            ->notEmptyString('tpf_nombre');

        $validator
            ->boolean('tpf_estado')
            ->notEmptyString('tpf_estado');

        $validator
            ->dateTime('tpf_fecha_creacion')
            ->notEmptyDateTime('tpf_fecha_creacion');

        return $validator;
    }
}
