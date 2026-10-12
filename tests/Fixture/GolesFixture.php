<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GolesFixture
 */
class GolesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'jugador_id' => 1,
                'jornada_id' => 1,
                'cantidad' => 1,
                'created' => '2026-10-01 17:16:38',
                'modified' => '2026-10-01 17:16:38',
            ],
        ];
        parent::init();
    }
}
