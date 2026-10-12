<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Incidencia'), ['action' => 'edit', $incidencia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Incidencia'), ['action' => 'delete', $incidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incidencia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Incidencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Incidencia'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="incidencias view content">
            <h3><?= h($incidencia->descripcion) ?></h3>
            <table>
                <tr>
                    <th><?= __('Jugador') ?></th>
                    <td><?= $incidencia->hasValue('jugador') ? $this->Html->link($incidencia->jugador->nombres, ['controller' => 'Jugadores', 'action' => 'view', $incidencia->jugador->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($incidencia->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo Tarjeta') ?></th>
                    <td><?= h($incidencia->tipo_tarjeta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($incidencia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Incidencia') ?></th>
                    <td><?= h($incidencia->fecha_incidencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Suspension') ?></th>
                    <td><?= h($incidencia->fecha_suspension) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($incidencia->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($incidencia->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>