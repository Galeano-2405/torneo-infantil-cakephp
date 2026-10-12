<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var string[]|\Cake\Collection\CollectionInterface $equipos
 */
?>

<div class="row">

    <aside class="column">
        <div class="side-nav">

            <h4 class="heading"><?= __('Acciones') ?></h4>

            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $jugadore->id],
                [
                    'confirm' => __('¿Está seguro de eliminar este jugador?'),
                    'class' => 'side-nav-item'
                ]
            ) ?>

            <?= $this->Html->link(
                __('Lista de jugadores'),
                ['action' => 'index'],
                ['class' => 'side-nav-item']
            ) ?>

        </div>
    </aside>


    <div class="column column-80">

        <div class="jugadores form content">

            <?= $this->Form->create(
                $jugadore,
                ['type' => 'file']
            ) ?>

            <fieldset>

                <legend><?= __('Editar Jugador') ?></legend>

                <?php

                echo $this->Form->control(
                    'nombres',
                    [
                        'label' => 'Nombres'
                    ]
                );

                echo $this->Form->control(
                    'apellidos',
                    [
                        'label' => 'Apellidos'
                    ]
                );

                echo $this->Form->control(
                    'fecha_nacimiento',
                    [
                        'label' => 'Fecha de nacimiento'
                    ]
                );

                ?>

                <?php if (!empty($jugadore->fotografia)): ?>

                    <div style="margin-bottom: 20px;">

                        <label>
                            <strong>Fotografía actual</strong>
                        </label>

                        <br><br>

                        <?= $this->Html->image(
                            'jugadores/' . $jugadore->fotografia,
                            [
                                'alt' => 'Fotografía de ' . $jugadore->nombres,
                                'style' =>
                                    'width:140px;
                                     height:140px;
                                     object-fit:cover;
                                     border-radius:10px;
                                     border:1px solid #ddd;'
                            ]
                        ) ?>

                    </div>

                <?php endif; ?>


                <?php

                echo $this->Form->control(
                    'fotografia_nueva',
                    [
                        'type' => 'file',
                        'label' => 'Cambiar fotografía',
                        'accept' => 'image/jpeg,image/png,image/jpg',
                        'required' => false
                    ]
                );

                echo $this->Form->control(
                    'equipo_id',
                    [
                        'options' => $equipos,
                        'label' => 'Equipo'
                    ]
                );

                ?>

            </fieldset>


            <?= $this->Form->button(
                __('Guardar cambios')
            ) ?>

            <?= $this->Form->end() ?>

        </div>

    </div>

</div>