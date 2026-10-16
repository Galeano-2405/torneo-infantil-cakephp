<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Editar jornada',
        'lead' => 'Cambia el nombre o la fecha de la jornada.',
        'icon' => 'edit',
        'tone' => 'turf',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($jornada) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Datos de la jornada</h2>
                    <p class="form-section__text">Si cambias la fecha, el reporte para árbitro usará la nueva.</p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('nombre', [
                            'label' => 'Nombre de la jornada',
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('fecha', [
                            'label' => 'Fecha del partido',
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a jornadas', 'guardar' => 'Guardar cambios']) ?>
        <?= $this->Form->end() ?>
    </section>

    <?= $this->element('danger_zone', [
        'id' => $jornada->id,
        'que' => 'esta jornada',
        'confirm' => '¿Eliminar la ' . $jornada->nombre . '?',
        'nota' => 'Solo se puede eliminar si no tiene goles registrados.',
    ]) ?>

</div>
