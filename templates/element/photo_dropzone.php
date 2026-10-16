<?php
/**
 * Zona para seleccionar la fotografía del jugador.
 *
 * @var \App\View\AppView $this
 * @var string $campo   'fotografia' (nuevo) | 'fotografia_nueva' (editar)
 * @var string $titulo
 */
?>
<div class="field span-2">
    <span class="field-label"><?= h($titulo) ?></span>
    <label class="dropzone">
        <span class="dropzone__preview"><?= $this->element('icon', ['name' => 'image']) ?></span>
        <span class="dropzone__text">
            <strong>Toca para elegir una foto o arrástrala aquí</strong>
            <span>JPG, JPEG o PNG</span>
        </span>
        <?= $this->Form->control($campo, [
            'type' => 'file',
            'label' => false,
            'accept' => 'image/jpeg,image/png,image/jpg',
            'required' => false,
        ]) ?>
    </label>
</div>
