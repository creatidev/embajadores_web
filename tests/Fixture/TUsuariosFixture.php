<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TUsuariosFixture
 */
class TUsuariosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_usuario' => 1,
                'id_rol' => 1,
                'usu_dni' => 1,
                'usu_nombre' => 'Lorem ipsum dolor sit amet',
                'usu_apellidos' => 'Lorem ipsum dolor sit amet',
                'usu_email' => 'Lorem ipsum dolor sit amet',
                'usu_celular' => 1,
                'usu_contrasena' => 'Lorem ipsum dolor sit amet',
                'usu_estado' => 1,
                'usu_fecha_creacion' => '2022-02-17 06:31:24',
                'usu_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
