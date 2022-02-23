<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TServiciosFixture
 */
class TServiciosFixture extends TestFixture
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
                'id_servicio' => 1,
                'ser_nombre' => 'Lorem ipsum dolor sit amet',
                'ser_estado' => 1,
                'ser_fecha_creacion' => '2022-02-17 06:35:25',
                'ser_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
