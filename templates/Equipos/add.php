<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Nuevo equipo',
        'lead' => 'Inscribe un equipo para poder asignarle jugadores.',
        'icon' => 'shield',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($equipo) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos del equipo</h2>
                    <p class="form-section__text">El nombre aparece en las listas, los reportes y el perfil de cada jugador.</p>
                </div>
                <div class="form-grid">
                    <div class="field span-2">
                        <?= $this->Form->control('nombre', [
                            'label' => 'Nombre del equipo',
                            'placeholder' => 'Ejemplo: Leones del Norte',
                            'autofocus' => true,
                        ]) ?>
                        <p class="hint">Usa el nombre con el que el equipo se presenta en el torneo.</p>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a equipos', 'guardar' => 'Guardar equipo']) ?>
        <?= $this->Form->end() ?>
    </section>

</div>
