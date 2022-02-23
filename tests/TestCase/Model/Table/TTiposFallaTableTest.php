<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TTiposFallaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TTiposFallaTable Test Case
 */
class TTiposFallaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TTiposFallaTable
     */
    protected $TTiposFalla;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TTiposFalla',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TTiposFalla') ? [] : ['className' => TTiposFallaTable::class];
        $this->TTiposFalla = $this->getTableLocator()->get('TTiposFalla', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TTiposFalla);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TTiposFallaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
