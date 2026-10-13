<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Registro de anotaciones
            </div>

            <h1>
                Registrar goles
            </h1>

            <p>
                Registra la cantidad de goles anotados por un jugador en una jornada.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Información de anotación
            </h3>

            <p>
                Selecciona jugador, jornada y cantidad de goles.
            </p>

        </div>


        <?= $this->Form->create($gole) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group">

                    <?= $this->Form->control(
                        'jugador_id',
                        [
                            'label' => 'Jugador',
                            'options' => $jugadors,
                            'empty' => 'Seleccione un jugador'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'jornada_id',
                        [
                            'label' => 'Jornada',
                            'options' => $jornadas,
                            'empty' => 'Seleccione una jornada'
                        ]
                    ) ?>

                </div>


                <div class="form-group full-width">

                    <?= $this->Form->control(
                        'cantidad',
                        [
                            'label' => 'Cantidad de goles',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'placeholder' => 'Ejemplo: 2'
                        ]
                    ) ?>

                    <span class="form-help">
                        Ingresa únicamente números enteros iguales o mayores a 0.
                    </span>

                </div>

            </div>

        </div>


        <div class="form-card-footer">

            <?= $this->Html->link(
                '← Volver a goles',
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>


            <div class="form-actions">

                <?= $this->Form->button(
                    'Guardar goles',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>