<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * TUsuario Entity
 *
 * @property int $id_usuario
 * @property int $id_rol
 * @property int $usu_dni
 * @property string $usu_nombre
 * @property string $usu_apellidos
 * @property string $usu_email
 * @property int|null $usu_celular
 * @property string $usu_contrasena
 * @property int $usu_estado
 * @property \Cake\I18n\FrozenTime $usu_fecha_creacion
 * @property bool $usu_eliminado
 */
class TUsuario extends Entity
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
        'id_rol' => true,
        'usu_dni' => true,
        'usu_nombre' => true,
        'usu_apellidos' => true,
        'usu_email' => true,
        'usu_celular' => true,
        'usu_contrasena' => true,
        'usu_estado' => true,
        'usu_fecha_creacion' => true,
        'usu_eliminado' => true,
    ];

    protected $_hidden = [
        'usu_contrasena',
    ];
}
