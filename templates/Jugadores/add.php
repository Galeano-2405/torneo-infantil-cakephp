<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Inscribir jugador',
        'lead' => 'Registra los datos del jugador, su equipo y una fotografía.',
        'icon' => 'shirt',
        'tone' => 'blue',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($jugadore, ['type' => 'file']) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos personales</h2>
                    <p class="form-section__text">Tal como aparecen en el documento del jugador.</p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('nombres', [
                            'label' => 'Nombres',
                            'placeholder' => 'Ejemplo: Ana Lucía',
                            'autofocus' => true,
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('apellidos', [
                            'label' => 'Apellidos',
                            'placeholder' => 'Ejemplo: Pérez López',
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('fecha_nacimiento', [
                            'label' => 'Fecha de nacimiento',
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('equipo_id', [
                            'label' => 'Equipo',
                            'options' => $equipos,
                            'empty' => 'Selecciona un equipo',
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Fotografía</h2>
                    <p class="form-section__text">El árbitro la usa para identificar al jugador el día del partido.</p>
                </div>
                <div class="form-grid">
                    <?= $this->element('photo_dropzone', ['campo' => 'fotografia', 'titulo' => 'Foto del jugador']) ?>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a jugadores', 'guardar' => 'Inscribir jugador']) ?>
        <?= $this->Form->end() ?>
    </section>

</div>
