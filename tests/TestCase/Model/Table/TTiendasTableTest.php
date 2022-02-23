<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TTiendasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TTiendasTable Test Case
 */
class TTiendasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TTiendasTable
     */
    protected $TTiendas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TTiendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TTiendas') ? [] : ['className' => TTiendasTable::class];
        $this->TTiendas = $this->getTableLocator()->get('TTiendas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TTiendas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TTiendasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
