<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Editar equipo',
        'lead' => 'Cambia el nombre del equipo. Los jugadores asignados se conservan.',
        'icon' => 'edit',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($equipo) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos del equipo</h2>
                    <p class="form-section__text">Equipo #<?= $equipo->id ?></p>
                </div>
                <div class="form-grid">
                    <div class="field span-2">
                        <?= $this->Form->control('nombre', [
                            'label' => 'Nombre del equipo',
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a equipos', 'guardar' => 'Guardar cambios']) ?>
        <?= $this->Form->end() ?>
    </section>

    <?= $this->element('danger_zone', [
        'id' => $equipo->id,
        'que' => 'este equipo',
        'confirm' => '¿Eliminar el equipo ' . $equipo->nombre . '?',
        'nota' => 'Solo se puede eliminar si ya no tiene jugadores asignados.',
    ]) ?>

</div>
