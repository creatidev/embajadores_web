<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TRole Entity
 *
 * @property int $id_rol
 * @property string $rol_nombre
 * @property bool $rol_estado
 * @property \Cake\I18n\FrozenTime $rol_fecha_creacion
 * @property bool $rol_eliminado
 */
class TRole extends Entity
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
        'rol_nombre' => true,
        'rol_estado' => true,
        'rol_fecha_creacion' => true,
        'rol_eliminado' => true,
    ];
}
