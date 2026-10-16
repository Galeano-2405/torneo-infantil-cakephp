<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Registrar goles',
        'lead' => 'Anota cuántos goles hizo un jugador en una jornada.',
        'icon' => 'ball',
        'tone' => 'gold',
    ]) ?>

    <section class="panel form-panel">
        <?= $this->Form->create($gole) ?>
            <div class="form-section">
                <div>
                    <h2 class="form-section__title">Anotación</h2>
                    <p class="form-section__text">Estos goles se suman automáticamente a la tabla de goleadores.</p>
                </div>
                <div class="form-grid">
                    <div class="field">
                        <?= $this->Form->control('jugador_id', [
                            'label' => 'Jugador',
                            'options' => $jugadors,
                            'empty' => 'Selecciona un jugador',
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('jornada_id', [
                            'label' => 'Jornada',
                            'options' => $jornadas,
                            'empty' => 'Selecciona una jornada',
                        ]) ?>
                    </div>
                    <div class="field">
                        <?= $this->Form->control('cantidad', [
                            'label' => 'Cantidad de goles',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'placeholder' => 'Ejemplo: 2',
                            'inputmode' => 'numeric',
                        ]) ?>
                        <p class="hint">Solo números enteros, desde 0.</p>
                    </div>
                </div>
            </div>

            <?= $this->element('form_bar', ['volver' => 'Volver a goles', 'guardar' => 'Guardar goles']) ?>
        <?= $this->Form->end() ?>
    </section>

</div>
