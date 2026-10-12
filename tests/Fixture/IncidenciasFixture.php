<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IncidenciasFixture
 */
class IncidenciasFixture extends TestFixture
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
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'tipo_tarjeta' => 'Lorem ipsum dolor sit amet',
                'fecha_incidencia' => '2026-10-01',
                'fecha_suspension' => '2026-10-01',
                'created' => '2026-10-01 17:16:42',
                'modified' => '2026-10-01 17:16:42',
            ],
        ];
        parent::init();
    }
}
