<?php
/**
 * Botones Ver / Editar / Eliminar de cada fila.
 *
 * @var \App\View\AppView $this
 * @var int $id
 * @var string $confirm   Mensaje de confirmación para eliminar
 * @var string|null $controller
 */
$base = isset($controller) ? ['controller' => $controller] : [];
?>
<div class="row-actions">
    <?= $this->Html->link(
        $this->element('icon', ['name' => 'eye', 'class' => 'icon--sm']) . '<span class="sr-only">Ver</span>',
        $base + ['action' => 'view', $id],
        ['class' => 'act act--view', 'escape' => false, 'data-tip' => 'Ver', 'title' => 'Ver']
    ) ?>
    <?= $this->Html->link(
        $this->element('icon', ['name' => 'edit', 'class' => 'icon--sm']) . '<span class="sr-only">Editar</span>',
        $base + ['action' => 'edit', $id],
        ['class' => 'act act--edit', 'escape' => false, 'data-tip' => 'Editar', 'title' => 'Editar']
    ) ?>
    <?= $this->Form->postLink(
        $this->element('icon', ['name' => 'trash', 'class' => 'icon--sm']) . '<span class="sr-only">Eliminar</span>',
        $base + ['action' => 'delete', $id],
        [
            'confirm' => $confirm,
            'class' => 'act act--delete',
            'escape' => false,
            'data-tip' => 'Eliminar',
            'title' => 'Eliminar',
        ]
    ) ?>
</div>
