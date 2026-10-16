<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var string[]|\Cake\Collection\CollectionInterface $equipos
 */
$nombreCompleto = $jugadore->nombres . ' ' . $jugadore->apellidos;
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Editar jugador',
        'lead' => 'Actualiza los datos de ' . $nombreCompleto . '.',
        'icon' => 'edit',
        'tone' => 'blue',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($jugadore, ['type' => 'file']) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos personales</h2>
                    <p class="form-section__text">Jugador #<?= $jugadore->id ?></p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('nombres', ['label' => 'Nombres']) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('apellidos', ['label' => 'Apellidos']) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de nacimiento']) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('equipo_id', [
                            'label' => 'Equipo',
                            'options' => $equipos,
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Fotografía</h2>
                    <p class="form-section__text">Si no eliges una nueva, se conserva la actual.</p>
                </div>
                <div class="form-grid">
                    <?php if (!empty($jugadore->fotografia)): ?>
                        <div class="field span-2">
                            <span class="field-label">Foto actual</span>
                            <div class="current-photo">
                                <?= $this->Html->image(
                                    'jugadores/' . $jugadore->fotografia,
                                    ['alt' => 'Fotografía de ' . $jugadore->nombres]
                                ) ?>
                                <div>
                                    <strong><?= h($nombreCompleto) ?></strong>
                                    <p class="hint">Se reemplaza solo si subes otra foto.</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?= $this->element('photo_dropzone', [
                        'campo' => 'fotografia_nueva',
                        'titulo' => !empty($jugadore->fotografia) ? 'Cambiar foto' : 'Agregar foto',
                    ]) ?>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a jugadores', 'guardar' => 'Guardar cambios']) ?>
        <?= $this->Form->end() ?>
    </section>

    <?= $this->element('danger_zone', [
        'id' => $jugadore->id,
        'que' => 'este jugador',
        'confirm' => '¿Eliminar a ' . $jugadore->nombres . '?',
        'nota' => 'También se borran su fotografía, sus goles y sus incidencias.',
    ]) ?>

</div>
