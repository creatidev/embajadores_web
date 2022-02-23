<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TComponentesFixture
 */
class TComponentesFixture extends TestFixture
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
                'id_componente' => 1,
                'id_servicio' => 1,
                'com_nombre' => 'Lorem ipsum dolor sit amet',
                'com_estado' => 1,
                'com_fecha_creacion' => '2022-02-17 06:34:33',
                'com_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
