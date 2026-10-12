<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Incidencia Entity
 *
 * @property int $id
 * @property int $jugador_id
 * @property string $descripcion
 * @property string $tipo_tarjeta
 * @property \Cake\I18n\Date $fecha_incidencia
 * @property \Cake\I18n\Date|null $fecha_suspension
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Jugadore $jugador
 */
class Incidencia extends Entity
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
        'descripcion' => true,
        'tipo_tarjeta' => true,
        'fecha_incidencia' => true,
        'fecha_suspension' => true,
        'created' => true,
        'modified' => true,
        'jugador' => true,
    ];
}
