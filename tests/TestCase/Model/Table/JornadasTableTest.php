<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JornadasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JornadasTable Test Case
 */
class JornadasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JornadasTable
     */
    protected $Jornadas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Jornadas',
        'app.Goles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Jornadas') ? [] : ['className' => JornadasTable::class];
        $this->Jornadas = $this->getTableLocator()->get('Jornadas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Jornadas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\JornadasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
