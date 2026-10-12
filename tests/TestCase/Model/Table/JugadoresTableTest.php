<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JugadoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JugadoresTable Test Case
 */
class JugadoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JugadoresTable
     */
    protected $Jugadores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Jugadores',
        'app.Equipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Jugadores') ? [] : ['className' => JugadoresTable::class];
        $this->Jugadores = $this->getTableLocator()->get('Jugadores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Jugadores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\JugadoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\JugadoresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
