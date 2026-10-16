<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Equipo> $equipos
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Equipos',
        'lead' => 'Los equipos inscritos en el torneo.',
        'icon' => 'shield',
        'actions' => $this->Html->link(
            $this->element('icon', ['name' => 'plus']) . 'Nuevo equipo',
            ['action' => 'add'],
            ['class' => 'btn btn--primary', 'escape' => false]
        ),
    ]) ?>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Lista de equipos</h2>
            <span class="count-chip"><strong><?= $this->Paginator->param('count') ?? count($equipos) ?></strong> equipos inscritos</span>
        </div>

        <?php if (count($equipos) > 0): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Equipo</th>
                            <th>Fecha de registro</th>
                            <th>Última actualización</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipos as $equipo): ?>
                            <tr>
                                <td class="cell-main" data-label="Equipo">
                                    <div class="who">
                                        <?= $this->element('crest', ['nombre' => $equipo->nombre]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($equipo->nombre),
                                                ['action' => 'view', $equipo->id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Equipo #<?= $equipo->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Registro">
                                    <?= !empty($equipo->created) ? h($equipo->created->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td data-label="Actualización">
                                    <?= !empty($equipo->modified) ? h($equipo->modified->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $equipo->id,
                                        'confirm' => '¿Eliminar el equipo ' . $equipo->nombre . '?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->element('pager', ['nombre' => 'equipos']) ?>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'shield']) ?></span>
                <p class="empty__title">Todavía no hay equipos</p>
                <p class="empty__text">Inscribe el primer equipo para poder asignarle jugadores.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Nuevo equipo',
                    ['action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
