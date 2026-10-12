<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gole'), ['action' => 'edit', $gole->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gole'), ['action' => 'delete', $gole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gole->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Goles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gole'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="goles view content">
            <h3><?= h($gole->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Jugador') ?></th>
                    <td><?= $gole->hasValue('jugador') ? $this->Html->link($gole->jugador->nombres, ['controller' => 'Jugadores', 'action' => 'view', $gole->jugador->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Jornada') ?></th>
                    <td><?= $gole->hasValue('jornada') ? $this->Html->link($gole->jornada->nombre, ['controller' => 'Jornadas', 'action' => 'view', $gole->jornada->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gole->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($gole->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($gole->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($gole->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>