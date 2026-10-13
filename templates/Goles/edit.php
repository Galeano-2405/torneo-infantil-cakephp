<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 * @var string[]|\Cake\Collection\CollectionInterface $jugadors
 * @var string[]|\Cake\Collection\CollectionInterface $jornadas
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Actualización de anotaciones
            </div>

            <h1>
                Editar goles
            </h1>

            <p>
                Modifica la información registrada para esta anotación.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Datos de anotación
            </h3>

            <p>
                Actualiza únicamente los campos necesarios.
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
                            'options' => $jugadors
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'jornada_id',
                        [
                            'label' => 'Jornada',
                            'options' => $jornadas
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
                            'step' => 1
                        ]
                    ) ?>

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

                <?= $this->Form->postLink(
                    'Eliminar',
                    [
                        'action' => 'delete',
                        $gole->id
                    ],
                    [
                        'confirm' =>
                            '¿Está seguro de eliminar este registro de goles?',
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