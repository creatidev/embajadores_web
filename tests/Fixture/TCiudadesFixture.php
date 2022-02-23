<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TCiudadesFixture
 */
class TCiudadesFixture extends TestFixture
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
                'id_ciudad' => 1,
                'ciu_nombre' => 'Lorem ipsum dolor sit amet',
                'ciu_estado' => 1,
                'ciu_fecha_creacion' => '2022-02-17 06:29:29',
                'ciu_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
