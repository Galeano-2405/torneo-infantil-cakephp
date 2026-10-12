<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 */
?>

<div class="row">

    <aside class="column">
        <div class="side-nav">

            <h4 class="heading"><?= __('Acciones') ?></h4>

            <?= $this->Html->link(
                __('Lista de goles'),
                ['action' => 'index'],
                ['class' => 'side-nav-item']
            ) ?>

        </div>
    </aside>

    <div class="column column-80">

        <div class="goles form content">

            <?= $this->Form->create($gole) ?>

            <fieldset>

                <legend><?= __('Registrar Goles') ?></legend>

                <?php

                echo $this->Form->control('jugador_id', [
                    'options' => $jugadors,
                    'label' => 'Jugador',
                    'empty' => 'Seleccione un jugador'
                ]);

                echo $this->Form->control('jornada_id', [
                    'options' => $jornadas,
                    'label' => 'Jornada',
                    'empty' => 'Seleccione una jornada'
                ]);

                echo $this->Form->control('cantidad', [
                    'label' => 'Cantidad de goles',
                    'type' => 'number',
                    'min' => 0,
                    'step' => 1
                ]);

                ?>

            </fieldset>

            <?= $this->Form->button(
                __('Guardar goles')
            ) ?>

            <?= $this->Form->end() ?>

        </div>

    </div>

</div>