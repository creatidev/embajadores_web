<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TServiciosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TServiciosTable Test Case
 */
class TServiciosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TServiciosTable
     */
    protected $TServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TServicios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TServicios') ? [] : ['className' => TServiciosTable::class];
        $this->TServicios = $this->getTableLocator()->get('TServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TServicios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TServiciosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
