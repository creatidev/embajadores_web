<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TComponentesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TComponentesTable Test Case
 */
class TComponentesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TComponentesTable
     */
    protected $TComponentes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TComponentes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TComponentes') ? [] : ['className' => TComponentesTable::class];
        $this->TComponentes = $this->getTableLocator()->get('TComponentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TComponentes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TComponentesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
