<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TRolesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TRolesTable Test Case
 */
class TRolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TRolesTable
     */
    protected $TRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TRoles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TRoles') ? [] : ['className' => TRolesTable::class];
        $this->TRoles = $this->getTableLocator()->get('TRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TRoles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TRolesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
