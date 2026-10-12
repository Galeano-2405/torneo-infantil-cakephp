<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Jornada'), ['action' => 'edit', $jornada->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Jornada'), ['action' => 'delete', $jornada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jornada->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jornadas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Jornada'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="jornadas view content">
            <h3><?= h($jornada->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($jornada->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($jornada->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($jornada->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($jornada->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($jornada->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Goles') ?></h4>
                <?php if (!empty($jornada->goles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Jugador Id') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($jornada->goles as $gole) : ?>
                        <tr>
                            <td><?= h($gole->id) ?></td>
                            <td><?= h($gole->jugador_id) ?></td>
                            <td><?= h($gole->cantidad) ?></td>
                            <td><?= h($gole->created) ?></td>
                            <td><?= h($gole->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Goles', 'action' => 'view', $gole->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Goles', 'action' => 'edit', $gole->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Goles', 'action' => 'delete', $gole->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $gole->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>