<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equipo'), ['action' => 'edit', $equipo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equipo'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equipo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="equipos view content">
            <h3><?= h($equipo->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($equipo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equipo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($equipo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($equipo->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Jugadores') ?></h4>
                <?php if (!empty($equipo->jugadores)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombres') ?></th>
                            <th><?= __('Apellidos') ?></th>
                            <th><?= __('Fecha Nacimiento') ?></th>
                            <th><?= __('Fotografia') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($equipo->jugadores as $jugadore) : ?>
                        <tr>
                            <td><?= h($jugadore->id) ?></td>
                            <td><?= h($jugadore->nombres) ?></td>
                            <td><?= h($jugadore->apellidos) ?></td>
                            <td><?= h($jugadore->fecha_nacimiento) ?></td>
                            <td><?= h($jugadore->fotografia) ?></td>
                            <td><?= h($jugadore->created) ?></td>
                            <td><?= h($jugadore->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Jugadores', 'action' => 'view', $jugadore->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Jugadores', 'action' => 'edit', $jugadore->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Jugadores', 'action' => 'delete', $jugadore->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $jugadore->id),
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