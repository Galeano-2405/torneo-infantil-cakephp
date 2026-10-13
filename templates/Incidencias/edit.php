<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 * @var string[]|\Cake\Collection\CollectionInterface $jugadors
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Actualización disciplinaria
            </div>

            <h1>
                Editar incidencia
            </h1>

            <p>
                Modifica la información registrada de la incidencia.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Datos de la incidencia
            </h3>

            <p>
                Actualiza únicamente los campos que necesites modificar.
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
                            'options' => $jugadors
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
                            ]
                        ]
                    ) ?>

                </div>


                <div class="form-group full-width">

                    <?= $this->Form->control(
                        'descripcion',
                        [
                            'label' => 'Descripción',
                            'type' => 'textarea'
                        ]
                    ) ?>

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
                        Déjalo vacío si la incidencia no implica suspensión.
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

                <?= $this->Form->postLink(
                    'Eliminar',
                    [
                        'action' => 'delete',
                        $incidencia->id
                    ],
                    [
                        'confirm' =>
                            '¿Está seguro de eliminar esta incidencia?',
                        'class' =>
                            'form-danger-button'
                    ]
                ) ?>


                <?= $this->Form->button(
                    'Guardar cambios',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>