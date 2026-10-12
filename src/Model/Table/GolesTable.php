<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Goles Model
 *
 * @property \App\Model\Table\JugadoresTable&\Cake\ORM\Association\BelongsTo $Jugadors
 * @property \App\Model\Table\JornadasTable&\Cake\ORM\Association\BelongsTo $Jornadas
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GolesTable extends Table
{
    /**
     * Initialize method
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('goles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Jugadors', [
            'foreignKey' => 'jugador_id',
            'className' => 'Jugadores',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Jornadas', [
            'foreignKey' => 'jornada_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Reglas de validación
     */
    public function validationDefault(Validator $validator): Validator
    {
        // Jugador
        $validator
            ->integer('jugador_id')
            ->notEmptyString(
                'jugador_id',
                'Debe seleccionar un jugador.'
            );

        // Jornada
        $validator
            ->integer('jornada_id')
            ->notEmptyString(
                'jornada_id',
                'Debe seleccionar una jornada.'
            );

        // Cantidad de goles
        $validator
            ->integer(
                'cantidad',
                'La cantidad de goles debe ser un número entero.'
            )
            ->greaterThanOrEqual(
                'cantidad',
                0,
                'La cantidad de goles no puede ser negativa.'
            )
            ->notEmptyString(
                'cantidad',
                'Debe ingresar la cantidad de goles.'
            );

        return $validator;
    }

    /**
     * Reglas de integridad
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // Validar que el jugador exista
        $rules->add(
            $rules->existsIn(
                ['jugador_id'],
                'Jugadors'
            ),
            [
                'errorField' => 'jugador_id',
                'message' => 'El jugador seleccionado no existe.'
            ]
        );

        // Validar que la jornada exista
        $rules->add(
            $rules->existsIn(
                ['jornada_id'],
                'Jornadas'
            ),
            [
                'errorField' => 'jornada_id',
                'message' => 'La jornada seleccionada no existe.'
            ]
        );

        return $rules;
    }
}