<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TUsuariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TUsuariosTable Test Case
 */
class TUsuariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TUsuariosTable
     */
    protected $TUsuarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TUsuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TUsuarios') ? [] : ['className' => TUsuariosTable::class];
        $this->TUsuarios = $this->getTableLocator()->get('TUsuarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TUsuarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TUsuariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
