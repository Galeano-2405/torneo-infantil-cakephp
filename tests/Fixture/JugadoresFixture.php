<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JugadoresFixture
 */
class JugadoresFixture extends TestFixture
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
                'nombres' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'fecha_nacimiento' => '2026-10-01',
                'fotografia' => 'Lorem ipsum dolor sit amet',
                'equipo_id' => 1,
                'created' => '2026-10-01 17:16:31',
                'modified' => '2026-10-01 17:16:31',
            ],
        ];
        parent::init();
    }
}
