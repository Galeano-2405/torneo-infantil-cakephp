<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jugadores Model
 *
 * @property \App\Model\Table\EquiposTable&\Cake\ORM\Association\BelongsTo $Equipos
 * @property \App\Model\Table\GolesTable&\Cake\ORM\Association\HasMany $Goles
 * @property \App\Model\Table\IncidenciasTable&\Cake\ORM\Association\HasMany $Incidencias
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JugadoresTable extends Table
{
    /**
     * Initialize method
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('jugadores');
        $this->setDisplayField('nombres');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        /**
         * Relación:
         * Un jugador pertenece a un equipo
         */
        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id',
            'joinType' => 'INNER',
        ]);

        /**
         * Relación:
         * Un jugador puede tener muchos registros de goles
         */
        $this->hasMany('Goles', [
            'foreignKey' => 'jugador_id',
            'dependent' => true,
        ]);

        /**
         * Relación:
         * Un jugador puede tener muchas incidencias
         */
        $this->hasMany('Incidencias', [
            'foreignKey' => 'jugador_id',
            'dependent' => true,
        ]);
    }

    /**
     * Reglas de validación
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nombres')
            ->maxLength(
                'nombres',
                100,
                'Los nombres no pueden superar los 100 caracteres.'
            )
            ->requirePresence('nombres', 'create')
            ->notEmptyString(
                'nombres',
                'Debe ingresar los nombres.'
            );

        $validator
            ->scalar('apellidos')
            ->maxLength(
                'apellidos',
                100,
                'Los apellidos no pueden superar los 100 caracteres.'
            )
            ->requirePresence('apellidos', 'create')
            ->notEmptyString(
                'apellidos',
                'Debe ingresar los apellidos.'
            );

        $validator
            ->date('fecha_nacimiento')
            ->requirePresence('fecha_nacimiento', 'create')
            ->notEmptyDate(
                'fecha_nacimiento',
                'Debe ingresar la fecha de nacimiento.'
            );

        $validator
            ->scalar('fotografia')
            ->maxLength('fotografia', 255)
            ->allowEmptyString('fotografia');

        $validator
            ->integer('equipo_id')
            ->notEmptyString(
                'equipo_id',
                'Debe seleccionar un equipo.'
            );

        return $validator;
    }

    /**
     * Reglas de integridad
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add(
            $rules->existsIn(
                ['equipo_id'],
                'Equipos'
            ),
            [
                'errorField' => 'equipo_id',
                'message' => 'El equipo seleccionado no existe.'
            ]
        );

        return $rules;
    }
}