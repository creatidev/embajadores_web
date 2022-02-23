<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TTienda Entity
 *
 * @property int $id_tienda
 * @property int $id_ciudad
 * @property int|null $id_usuario
 * @property string $tie_nombre
 * @property bool $tie_estado_operacion
 * @property bool $tie_estado
 * @property \Cake\I18n\FrozenTime $tie_fecha_creacion
 * @property bool $tie_eliminado
 */
class TTienda extends Entity
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
        'id_ciudad' => true,
        'id_usuario' => true,
        'tie_nombre' => true,
        'tie_estado_operacion' => true,
        'tie_estado' => true,
        'tie_fecha_creacion' => true,
    ];
}
