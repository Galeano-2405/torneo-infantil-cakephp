<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jugadore Entity
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property \Cake\I18n\Date $fecha_nacimiento
 * @property string|null $fotografia
 * @property int $equipo_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Equipo $equipo
 */
class Jugadore extends Entity
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
        'nombres' => true,
        'apellidos' => true,
        'fecha_nacimiento' => true,
        'fotografia' => true,
        'equipo_id' => true,
        'created' => true,
        'modified' => true,
        'equipo' => true,
    ];
}
