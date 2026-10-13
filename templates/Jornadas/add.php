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
                Planificación del torneo
            </div>

            <h1>
                Nueva jornada
            </h1>

            <p>
                Registra una nueva jornada y define la fecha programada.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Información de la jornada
            </h3>

            <p>
                Completa los datos necesarios para crear la jornada.
            </p>

        </div>


        <?= $this->Form->create($jornada) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group">

                    <?= $this->Form->control(
                        'nombre',
                        [
                            'label' => 'Nombre de la jornada',
                            'placeholder' => 'Ejemplo: Jornada 1'
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

                    <span class="form-help">
                        Selecciona la fecha programada para esta jornada.
                    </span>

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

                <?= $this->Form->button(
                    'Guardar jornada',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>