<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 * @var string[]|\Cake\Collection\CollectionInterface $jugadors
 * @var string[]|\Cake\Collection\CollectionInterface $jornadas
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Editar goles',
        'lead' => 'Corrige el jugador, la jornada o la cantidad de goles.',
        'icon' => 'edit',
        'tone' => 'gold',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($gole) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Anotación</h2>
                    <p class="form-section__text">Registro #<?= $gole->id ?></p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('jugador_id', [
                            'label' => 'Jugador',
                            'options' => $jugadors,
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('jornada_id', [
                            'label' => 'Jornada',
                            'options' => $jornadas,
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('cantidad', [
                            'label' => 'Cantidad de goles',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'inputmode' => 'numeric',
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a goles', 'guardar' => 'Guardar cambios']) ?>
        <?= $this->Form->end() ?>
    </section>

    <?= $this->element('danger_zone', [
        'id' => $gole->id,
        'que' => 'este registro',
        'confirm' => '¿Eliminar este registro de goles?',
        'nota' => 'Los goles se restan de la tabla de goleadores.',
    ]) ?>

</div>
