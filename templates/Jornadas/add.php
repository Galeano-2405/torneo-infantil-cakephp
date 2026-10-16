<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Nueva jornada',
        'lead' => 'Programa una fecha del campeonato.',
        'icon' => 'calendar',
        'tone' => 'turf',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($jornada) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos de la jornada</h2>
                    <p class="form-section__text">La fecha define qué jugadores quedan suspendidos en el reporte para árbitro.</p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('nombre', [
                            'label' => 'Nombre de la jornada',
                            'placeholder' => 'Ejemplo: Jornada 1',
                            'autofocus' => true,
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('fecha', [
                            'label' => 'Fecha del partido',
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a jornadas', 'guardar' => 'Guardar jornada']) ?>
        <?= $this->Form->end() ?>
    </section>

</div>
