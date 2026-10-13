<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var string[]|\Cake\Collection\CollectionInterface $equipos
 */
?>

<div class="form-page">

    <div class="form-header">

        <div>

            <div class="form-kicker">
                Actualización de jugador
            </div>

            <h1>
                Editar jugador
            </h1>

            <p>
                Actualiza la información registrada del jugador.
            </p>

        </div>

    </div>


    <div class="form-card">

        <div class="form-card-top">

            <h3>
                Datos del jugador
            </h3>

            <p>
                Modifica únicamente los campos que necesites actualizar.
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
                            'label' => 'Nombres'
                        ]
                    ) ?>

                </div>


                <div class="form-group">

                    <?= $this->Form->control(
                        'apellidos',
                        [
                            'label' => 'Apellidos'
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
                            'options' => $equipos
                        ]
                    ) ?>

                </div>


                <?php if (!empty($jugadore->fotografia)): ?>

                    <div class="form-group full-width">

                        <label>
                            Fotografía actual
                        </label>

                        <div class="current-photo-box">

                            <?= $this->Html->image(
                                'jugadores/' .
                                $jugadore->fotografia,
                                [
                                    'alt' =>
                                        'Fotografía de ' .
                                        $jugadore->nombres
                                ]
                            ) ?>


                            <div>

                                <strong>
                                    <?= h(
                                        $jugadore->nombres .
                                        ' ' .
                                        $jugadore->apellidos
                                    ) ?>
                                </strong>

                                <span>
                                    Esta fotografía se conservará si no seleccionas una nueva.
                                </span>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>


                <div class="form-group full-width">

                    <label>
                        Cambiar fotografía
                    </label>

                    <div class="file-box">

                        <?= $this->Form->control(
                            'fotografia_nueva',
                            [
                                'type' => 'file',
                                'label' => false,
                                'accept' =>
                                    'image/jpeg,image/png,image/jpg',
                                'required' => false
                            ]
                        ) ?>

                    </div>

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

                <?= $this->Form->postLink(
                    'Eliminar',
                    [
                        'action' => 'delete',
                        $jugadore->id
                    ],
                    [
                        'confirm' =>
                            '¿Está seguro de eliminar este jugador?',
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