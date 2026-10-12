<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Incidencia> $incidencias
 */
?>
<div class="incidencias index content">
    <?= $this->Html->link(__('New Incidencia'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Incidencias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('jugador_id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('tipo_tarjeta') ?></th>
                    <th><?= $this->Paginator->sort('fecha_incidencia') ?></th>
                    <th><?= $this->Paginator->sort('fecha_suspension') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incidencias as $incidencia): ?>
                <tr>
                    <td><?= $this->Number->format($incidencia->id) ?></td>
                    <td><?= $incidencia->hasValue('jugador') ? $this->Html->link($incidencia->jugador->nombres, ['controller' => 'Jugadores', 'action' => 'view', $incidencia->jugador->id]) : '' ?></td>
                    <td><?= h($incidencia->descripcion) ?></td>
                    <td><?= h($incidencia->tipo_tarjeta) ?></td>
                    <td><?= h($incidencia->fecha_incidencia) ?></td>
                    <td><?= h($incidencia->fecha_suspension) ?></td>
                    <td><?= h($incidencia->created) ?></td>
                    <td><?= h($incidencia->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $incidencia->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $incidencia->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $incidencia->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $incidencia->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>