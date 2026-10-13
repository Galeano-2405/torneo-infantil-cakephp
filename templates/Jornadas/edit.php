<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Actualización de jornada
            </div>

            <h1>
                Editar jornada
            </h1>

            <p>
                Modifica el nombre o la fecha programada de la jornada.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Datos de la jornada
            </h3>

            <p>
                Actualiza únicamente los campos que necesites modificar.
            </p>

        </div>


        <?= $this->Form->create($jornada) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group">

                    <?= $this->Form->control(
                        'nombre',
                        [
                            'label' => 'Nombre de la jornada'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'fecha',
                        [
                            'label' => 'Fecha de la jornada'
                        ]
                    ) ?>

                </div>

            </div>

        </div>


        <div class="form-card-footer">

            <?= $this->Html->link(
                '← Volver a jornadas',
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
                        $jornada->id
                    ],
                    [
                        'confirm' =>
                            '¿Está seguro de eliminar esta jornada?',
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