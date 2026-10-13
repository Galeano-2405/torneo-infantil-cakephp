<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Control disciplinario
            </div>

            <h1>
                Nueva incidencia
            </h1>

            <p>
                Registra faltas, tarjetas y suspensiones de los jugadores.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Información de la incidencia
            </h3>

            <p>
                Completa los datos disciplinarios del jugador.
            </p>

        </div>


        <?= $this->Form->create($incidencia) ?>


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
                        'tipo_tarjeta',
                        [
                            'label' => 'Tipo de tarjeta',
                            'type' => 'select',
                            'options' => [
                                'Amarilla' => '🟨 Amarilla',
                                'Roja' => '🟥 Roja'
                            ],
                            'empty' => 'Seleccione una tarjeta'
                        ]
                    ) ?>

                </div>


                <div class="form-group full-width">

                    <?= $this->Form->control(
                        'descripcion',
                        [
                            'label' => 'Descripción',
                            'type' => 'textarea',
                            'placeholder' =>
                                'Ejemplo: Falta grave, conducta antideportiva, entrada peligrosa...'
                        ]
                    ) ?>

                    <span class="form-help">
                        Describe brevemente el motivo de la incidencia.
                    </span>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'fecha_incidencia',
                        [
                            'label' => 'Fecha de incidencia'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'fecha_suspension',
                        [
                            'label' => 'Fecha de suspensión',
                            'empty' => true
                        ]
                    ) ?>

                    <span class="form-help">
                        Déjalo vacío si el jugador no tiene suspensión.
                    </span>

                </div>

            </div>

        </div>


        <div class="form-card-footer">

            <?= $this->Html->link(
                '← Volver a incidencias',
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>


            <div class="form-actions">

                <?= $this->Form->button(
                    'Guardar incidencia',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>