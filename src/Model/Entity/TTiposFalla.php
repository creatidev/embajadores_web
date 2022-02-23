<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TTiposFalla Entity
 *
 * @property int $id_tipo_falla
 * @property string $tpf_nombre
 * @property bool $tpf_estado
 * @property \Cake\I18n\FrozenTime $tpf_fecha_creacion
 * @property bool $tpf_eliminado
 */
class TTiposFalla extends Entity
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
        'tpf_nombre' => true,
        'tpf_estado' => true,
        'tpf_fecha_creacion' => true,
        'tpf_eliminado' => true,
    ];
}
