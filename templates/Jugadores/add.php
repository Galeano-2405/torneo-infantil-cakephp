<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Registro de jugador
            </div>

            <h1>
                Nuevo jugador
            </h1>

            <p>
                Registra los datos generales y fotografía del jugador.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Información del jugador
            </h3>

            <p>
                Complete los campos requeridos para crear el registro.
            </p>

        </div>


        <?= $this->Form->create(
            $jugadore,
            ['type' => 'file']
        ) ?>


        <div class="form-card-body">

            <div class="form-grid">

                <div class="form-group">

                    <?= $this->Form->control(
                        'nombres',
                        [
                            'label' => 'Nombres',
                            'placeholder' => 'Ingrese los nombres'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'apellidos',
                        [
                            'label' => 'Apellidos',
                            'placeholder' => 'Ingrese los apellidos'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'fecha_nacimiento',
                        [
                            'label' => 'Fecha de nacimiento'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'equipo_id',
                        [
                            'label' => 'Equipo',
                            'options' => $equipos,
                            'empty' => 'Seleccione un equipo'
                        ]
                    ) ?>

                </div>


                <div class="form-group full-width">

                    <label>
                        Fotografía
                    </label>

                    <div class="file-box">

                        <?= $this->Form->control(
                            'fotografia',
                            [
                                'type' => 'file',
                                'label' => false,
                                'accept' =>
                                    'image/jpeg,image/png,image/jpg'
                            ]
                        ) ?>

                    </div>

                    <span class="form-help">
                        Formatos permitidos: JPG, JPEG y PNG.
                    </span>

                </div>

            </div>

        </div>


        <div class="form-card-footer">

            <?= $this->Html->link(
                '← Volver a jugadores',
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>


            <div class="form-actions">

                <?= $this->Form->button(
                    'Guardar jugador',
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>


        <?= $this->Form->end() ?>

    </div>

</div>