<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gole Entity
 *
 * @property int $id
 * @property int $jugador_id
 * @property int $jornada_id
 * @property int $cantidad
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Jugadore $jugador
 * @property \App\Model\Entity\Jornada $jornada
 */
class Gole extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'jugador_id' => true,
        'jornada_id' => true,
        'cantidad' => true,
        'created' => true,
        'modified' => true,
        'jugador' => true,
        'jornada' => true,
    ];
}
