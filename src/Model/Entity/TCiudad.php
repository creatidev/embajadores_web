<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TCiudad Entity
 *
 * @property int $id_ciudad
 * @property string $ciu_nombre
 * @property bool $ciu_estado
 * @property \Cake\I18n\FrozenTime $ciu_fecha_creacion
 * @property bool $ciu_eliminado
 */
class TCiudad extends Entity
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
        'ciu_nombre' => true,
        'ciu_estado' => true,
        'ciu_fecha_creacion' => true,
    ];
}
