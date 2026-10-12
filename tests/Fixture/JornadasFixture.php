<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JornadasFixture
 */
class JornadasFixture extends TestFixture
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
                'nombre' => 'Lorem ipsum dolor sit amet',
                'fecha' => '2026-10-01',
                'created' => '2026-10-01 17:16:35',
                'modified' => '2026-10-01 17:16:35',
            ],
        ];
        parent::init();
    }
}
