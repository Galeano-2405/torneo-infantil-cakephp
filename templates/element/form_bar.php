<?php
/**
 * Barra inferior de los formularios: volver + guardar.
 *
 * @var \App\View\AppView $this
 * @var string $volver   Texto del enlace de regreso
 * @var string $guardar  Texto del botón principal
 * @var array|null $url  URL de regreso (por defecto: index)
 */
?>
<div class="form-bar">
    <?= $this->Html->link(
        $this->element('icon', ['name' => 'arrow-left']) . h($volver),
        $url ?? ['action' => 'index'],
        ['class' => 'btn btn--ghost', 'escape' => false]
    ) ?>
    <div class="form-bar__end">
        <?= $this->Form->button(
            $this->element('icon', ['name' => 'check']) . h($guardar),
            ['class' => 'btn btn--primary', 'escapeTitle' => false, 'type' => 'submit']
        ) ?>
    </div>
</div>
