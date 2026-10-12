<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jornada> $jornadas
 */
?>
<div class="jornadas index content">
    <?= $this->Html->link(__('New Jornada'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jornadas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jornadas as $jornada): ?>
                <tr>
                    <td><?= $this->Number->format($jornada->id) ?></td>
                    <td><?= h($jornada->nombre) ?></td>
                    <td><?= h($jornada->fecha) ?></td>
                    <td><?= h($jornada->created) ?></td>
                    <td><?= h($jornada->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $jornada->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jornada->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $jornada->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $jornada->id),
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