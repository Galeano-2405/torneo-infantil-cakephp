<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jugadore> $jugadores
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Jugadores',
        'lead' => 'Los niños y niñas inscritos, con su equipo y fotografía.',
        'icon' => 'shirt',
        'tone' => 'blue',
        'actions' => $this->Html->link(
            $this->element('icon', ['name' => 'plus']) . 'Inscribir jugador',
            ['action' => 'add'],
            ['class' => 'btn btn--primary', 'escape' => false]
        ),
    ]) ?>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Plantilla</h2>
            <span class="count-chip"><strong><?= $this->Paginator->param('count') ?? count($jugadores) ?></strong> jugadores inscritos</span>
        </div>

        <?php if (count($jugadores) > 0): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jugador</th>
                            <th>Equipo</th>
                            <th>Fecha de nacimiento</th>
                            <th>Inscrito el</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jugadores as $jugadore): ?>
                            <?php $nombreCompleto = $jugadore->nombres . ' ' . $jugadore->apellidos; ?>
                            <tr>
                                <td class="cell-main" data-label="Jugador">
                                    <div class="who">
                                        <?= $this->element('avatar', [
                                            'foto' => $jugadore->fotografia,
                                            'nombre' => $nombreCompleto,
                                        ]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($nombreCompleto),
                                                ['action' => 'view', $jugadore->id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Jugador #<?= $jugadore->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Equipo">
                                    <?php if ($jugadore->hasValue('equipo')): ?>
                                        <span class="tag tag--team">
                                            <?= $this->element('icon', ['name' => 'shield']) ?>
                                            <?= h($jugadore->equipo->nombre) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="muted">Sin equipo</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Nacimiento">
                                    <?= !empty($jugadore->fecha_nacimiento)
                                        ? h($jugadore->fecha_nacimiento->format('d/m/Y'))
                                        : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td data-label="Inscrito el">
                                    <?= !empty($jugadore->created)
                                        ? h($jugadore->created->format('d/m/Y'))
                                        : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $jugadore->id,
                                        'confirm' => '¿Eliminar a ' . $jugadore->nombres . '?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->element('pager', ['nombre' => 'jugadores']) ?>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'shirt']) ?></span>
                <p class="empty__title">Todavía no hay jugadores</p>
                <p class="empty__text">Inscribe al primer jugador y asígnale un equipo.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Inscribir jugador',
                    ['action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
