<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Actualización de equipo
            </div>

            <h1>
                Editar equipo
            </h1>

            <p>
                Modifica la información registrada del equipo.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Datos del equipo
            </h3>

            <p>
                Actualiza únicamente los campos que necesites modificar.
            </p>

        </div>


        <?= $this->Form->create($equipo) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group full-width">

                    <?= $this->Form->control(
                        'nombre',
                        [
                            'label' => 'Nombre del equipo'
                        ]
                    ) ?>

                </div>

            </div>

        </div>


        <div class="form-card-footer">

            <?= $this->Html->link(
                '← Volver a equipos',
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
                        $equipo->id
                    ],
                    [
                        'confirm' =>
                            '¿Está seguro de eliminar este equipo?',
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