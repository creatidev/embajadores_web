<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TTiposFallaFixture
 */
class TTiposFallaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 't_tipos_falla';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_tipo_falla' => 1,
                'tpf_nombre' => 'Lorem ipsum dolor sit amet',
                'tpf_estado' => 1,
                'tpf_fecha_creacion' => '2022-02-17 06:35:50',
                'tpf_eliminado' => 1,
            ],
        ];
        parent::init();
    }
}
