<?php
/**
 * Bloque para eliminar un registro desde la pantalla de edición.
 * Va FUERA del formulario de edición para que el botón funcione.
 *
 * @var \App\View\AppView $this
 * @var int $id
 * @var string $que       Ej.: 'este equipo'
 * @var string $confirm
 * @var string|null $nota
 */
?>
<div class="danger-zone">
    <div>
        <strong>Eliminar <?= h($que) ?></strong>
        <span><?= h($nota ?? 'Se borra de forma permanente.') ?></span>
    </div>
    <?= $this->Form->postLink(
        $this->element('icon', ['name' => 'trash']) . 'Eliminar',
        ['action' => 'delete', $id],
        [
            'confirm' => $confirm,
            'class' => 'btn btn--danger btn--sm',
            'escape' => false,
        ]
    ) ?>
</div>
