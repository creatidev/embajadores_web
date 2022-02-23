<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TCiudadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TCiudadesTable Test Case
 */
class TCiudadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TCiudadesTable
     */
    protected $TCiudades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TCiudades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TCiudades') ? [] : ['className' => TCiudadesTable::class];
        $this->TCiudades = $this->getTableLocator()->get('TCiudades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TCiudades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TCiudadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
