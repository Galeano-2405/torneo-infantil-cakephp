<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Nueva incidencia',
        'lead' => 'Registra una tarjeta y, si aplica, la fecha de suspensión.',
        'icon' => 'card',
        'tone' => 'red',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($incidencia) ?>
            <?= $this->element('incidencia_fields', ['jugadors' => $jugadors, 'nueva' => true]) ?>
            <?= $this->element('form_bar', ['volver' => 'Volver a incidencias', 'guardar' => 'Guardar incidencia']) ?>
        <?= $this->Form->end() ?>
    </section>

</div>
