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
                Catálogo del torneo
            </div>

            <h1>
                Nuevo equipo
            </h1>

            <p>
                Registra un nuevo equipo participante del torneo.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Información del equipo
            </h3>

            <p>
                Completa los datos necesarios para crear el equipo.
            </p>

        </div>


        <?= $this->Form->create($equipo) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group full-width">

                    <?= $this->Form->control(
                        'nombre',
                        [
                            'label' => 'Nombre del equipo',
                            'placeholder' => 'Ejemplo: FC Barcelona'
                        ]
                    ) ?>

                    <span class="form-help">
                        Ingresa el nombre con el que será identificado el equipo.
                    </span>

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

                <?= $this->Form->button(
                    'Guardar equipo',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>