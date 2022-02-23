<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TTiendasFixture
 */
class TTiendasFixture extends TestFixture
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
                'id_tienda' => 1,
                'id_ciudad' => 1,
                'id_usuario' => 1,
                'tie_nombre' => 'Lorem ipsum dolor sit amet',
                'tie_estado_operacion' => 1,
                'tie_estado' => 1,
                'tie_fecha_creacion' => '2022-02-17 06:35:30',
                'tie_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
