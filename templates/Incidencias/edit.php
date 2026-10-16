<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 * @var string[]|\Cake\Collection\CollectionInterface $jugadors
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Editar incidencia',
        'lead' => 'Corrige la tarjeta, el motivo o las fechas.',
        'icon' => 'edit',
        'tone' => 'red',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($incidencia) ?>
            <?= $this->element('incidencia_fields', ['jugadors' => $jugadors, 'nueva' => false]) ?>
            <?= $this->element('form_bar', ['volver' => 'Volver a incidencias', 'guardar' => 'Guardar cambios']) ?>
        <?= $this->Form->end() ?>
    </section>

    <?= $this->element('danger_zone', [
        'id' => $incidencia->id,
        'que' => 'esta incidencia',
        'confirm' => '¿Eliminar esta incidencia?',
        'nota' => 'Si tenía suspensión, el jugador vuelve a quedar habilitado.',
    ]) ?>

</div>
