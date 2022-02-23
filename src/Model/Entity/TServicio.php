<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TServicio Entity
 *
 * @property int $id_servicio
 * @property string $ser_nombre
 * @property bool $ser_estado
 * @property \Cake\I18n\FrozenTime $ser_fecha_creacion
 * @property bool $ser_eliminado
 */
class TServicio extends Entity
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
        'ser_nombre' => true,
        'ser_estado' => true,
        'ser_fecha_creacion' => true,
        'ser_eliminado' => true,
    ];
}
