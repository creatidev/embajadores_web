<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TComponente Entity
 *
 * @property int $id_componente
 * @property int $id_servicio
 * @property string $com_nombre
 * @property bool $com_estado
 * @property \Cake\I18n\FrozenTime $com_fecha_creacion
 * @property bool $com_eliminado
 */
class TComponente extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_servicio' => true,
        'com_nombre' => true,
        'com_estado' => true,
        'com_fecha_creacion' => true,
        'com_eliminado' => true,
    ];
}
