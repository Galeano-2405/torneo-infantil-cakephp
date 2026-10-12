<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Incidencias Model
 *
 * @property \App\Model\Table\JugadoresTable&\Cake\ORM\Association\BelongsTo $Jugadors
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IncidenciasTable extends Table
{
    /**
     * Initialize method
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('incidencias');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Jugadors', [
            'foreignKey' => 'jugador_id',
            'className' => 'Jugadores',
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

        // Descripción
        $validator
            ->scalar('descripcion')
            ->maxLength(
                'descripcion',
                255,
                'La descripción no puede superar los 255 caracteres.'
            )
            ->requirePresence('descripcion', 'create')
            ->notEmptyString(
                'descripcion',
                'Debe ingresar una descripción.'
            );

        // Tipo de tarjeta
        $validator
            ->scalar('tipo_tarjeta')
            ->requirePresence('tipo_tarjeta', 'create')
            ->notEmptyString(
                'tipo_tarjeta',
                'Debe seleccionar un tipo de tarjeta.'
            )
            ->inList(
                'tipo_tarjeta',
                ['Amarilla', 'Roja'],
                'El tipo de tarjeta debe ser Amarilla o Roja.'
            );

        // Fecha de incidencia
        $validator
            ->date('fecha_incidencia')
            ->requirePresence('fecha_incidencia', 'create')
            ->notEmptyDate(
                'fecha_incidencia',
                'Debe seleccionar la fecha de incidencia.'
            );

        // Fecha de suspensión
        $validator
            ->date(
                'fecha_suspension',
                ['ymd'],
                'Ingrese una fecha de suspensión válida.'
            )
            ->allowEmptyDate('fecha_suspension');

        /*
         * Regla especial:
         * Si la tarjeta es Roja, la fecha de suspensión
         * es obligatoria.
         */
        $validator->add(
            'fecha_suspension',
            'fechaObligatoriaTarjetaRoja',
            [
                'rule' => function ($value, $context) {

                    $tipoTarjeta =
                        $context['data']['tipo_tarjeta'] ?? null;

                    if ($tipoTarjeta === 'Roja') {

                        if (
                            $value === null ||
                            $value === ''
                        ) {
                            return false;
                        }
                    }

                    return true;
                },

                'message' =>
                    'La fecha de suspensión es obligatoria cuando la tarjeta es Roja.'
            ]
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
                ['jugador_id'],
                'Jugadors'
            ),
            [
                'errorField' => 'jugador_id',
                'message' => 'El jugador seleccionado no existe.'
            ]
        );

        return $rules;
    }
}