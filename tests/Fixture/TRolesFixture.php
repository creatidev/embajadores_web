<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TRolesFixture
 */
class TRolesFixture extends TestFixture
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
                'id_rol' => 1,
                'rol_nombre' => 'Lorem ipsum dolor sit amet',
                'rol_estado' => 1,
                'rol_fecha_creacion' => '2022-02-17 06:34:55',
                'rol_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
