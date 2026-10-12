<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>

            <?= $this->Html->link(
                __('List Jugadores'),
                ['action' => 'index'],
                ['class' => 'side-nav-item']
            ) ?>

        </div>
    </aside>

    <div class="column column-80">
        <div class="jugadores form content">

            <?= $this->Form->create($jugadore, ['type' => 'file']) ?>

            <fieldset>
                <legend><?= __('Add Jugadore') ?></legend>

                <?php
                    echo $this->Form->control('nombres', [
                        'label' => 'Nombres'
                    ]);

                    echo $this->Form->control('apellidos', [
                        'label' => 'Apellidos'
                    ]);

                    echo $this->Form->control('fecha_nacimiento', [
                        'label' => 'Fecha de nacimiento'
                    ]);

                    echo $this->Form->control('fotografia', [
                        'type' => 'file',
                        'label' => 'Fotografía',
                        'accept' => 'image/jpeg,image/png,image/jpg'
                    ]);

                    echo $this->Form->control('equipo_id', [
                        'options' => $equipos,
                        'label' => 'Equipo'
                    ]);
                ?>

            </fieldset>

            <?= $this->Form->button(__('Guardar jugador')) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>