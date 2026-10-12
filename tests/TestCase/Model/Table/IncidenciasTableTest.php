<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncidenciasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncidenciasTable Test Case
 */
class IncidenciasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncidenciasTable
     */
    protected $Incidencias;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Incidencias',
        'app.Jugadors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Incidencias') ? [] : ['className' => IncidenciasTable::class];
        $this->Incidencias = $this->getTableLocator()->get('Incidencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Incidencias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\IncidenciasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\IncidenciasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
