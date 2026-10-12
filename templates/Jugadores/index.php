<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jugadore> $jugadores
 */
?>
<div class="jugadores index content">
    <?= $this->Html->link(__('New Jugadore'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jugadores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombres') ?></th>
                    <th><?= $this->Paginator->sort('apellidos') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('fotografia') ?></th>
                    <th><?= $this->Paginator->sort('equipo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $jugadore): ?>
                <tr>
                    <td><?= $this->Number->format($jugadore->id) ?></td>
                    <td><?= h($jugadore->nombres) ?></td>
                    <td><?= h($jugadore->apellidos) ?></td>
                    <td><?= h($jugadore->fecha_nacimiento) ?></td>
                    <td>
    <?php if (!empty($jugadore->fotografia)): ?>
        <?= $this->Html->image(
            'jugadores/' . $jugadore->fotografia,
            [
                'alt' => 'Fotografía de ' . $jugadore->nombres,
                'style' => 'width:80px; height:80px; object-fit:cover; border-radius:8px;'
            ]
        ) ?>
    <?php else: ?>
        Sin fotografía
    <?php endif; ?>
</td>
                    <td><?= $jugadore->hasValue('equipo') ? $this->Html->link($jugadore->equipo->nombre, ['controller' => 'Equipos', 'action' => 'view', $jugadore->equipo->id]) : '' ?></td>
                    <td><?= h($jugadore->created) ?></td>
                    <td><?= h($jugadore->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $jugadore->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jugadore->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $jugadore->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $jugadore->id),
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