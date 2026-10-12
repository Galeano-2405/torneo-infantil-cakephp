<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Gole> $goles
 */
?>
<div class="goles index content">
    <?= $this->Html->link(__('New Gole'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Goles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('jugador_id') ?></th>
                    <th><?= $this->Paginator->sort('jornada_id') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($goles as $gole): ?>
                <tr>
                    <td><?= $this->Number->format($gole->id) ?></td>
                    <td><?= $gole->hasValue('jugador') ? $this->Html->link($gole->jugador->nombres, ['controller' => 'Jugadores', 'action' => 'view', $gole->jugador->id]) : '' ?></td>
                    <td><?= $gole->hasValue('jornada') ? $this->Html->link($gole->jornada->nombre, ['controller' => 'Jornadas', 'action' => 'view', $gole->jornada->id]) : '' ?></td>
                    <td><?= $this->Number->format($gole->cantidad) ?></td>
                    <td><?= h($gole->created) ?></td>
                    <td><?= h($gole->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $gole->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gole->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $gole->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $gole->id),
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