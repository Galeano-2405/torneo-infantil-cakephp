<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
$golesJornada = 0;
foreach ($jornada->goles ?? [] as $g) {
    $golesJornada += (int)$g->cantidad;
}
$meses = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Detalle de la jornada',
        'icon' => 'calendar',
        'tone' => 'turf',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Jornadas',
                ['action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'edit']) . 'Editar',
                ['action' => 'edit', $jornada->id],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="matchday" style="margin-top:0">
        <div class="matchday__date">
            <?php if (!empty($jornada->fecha)): ?>
                <small><?= $meses[(int)$jornada->fecha->format('n') - 1] ?> <?= $jornada->fecha->format('Y') ?></small>
                <strong><?= $jornada->fecha->format('d') ?></strong>
            <?php else: ?>
                <small>Sin fecha</small><strong>–</strong>
            <?php endif; ?>
        </div>
        <div>
            <h2><?= h($jornada->nombre) ?></h2>
            <p>Jornada #<?= $jornada->id ?><?= !empty($jornada->fecha) ? ', ' . h($jornada->fecha->format('d/m/Y')) : '' ?></p>
        </div>
        <div class="matchday__stats">
            <div class="matchday__stat">
                <strong><?= $golesJornada ?></strong>
                <span>goles anotados</span>
            </div>
            <div class="matchday__stat">
                <strong><?= count($jornada->goles ?? []) ?></strong>
                <span>registros</span>
            </div>
        </div>
    </section>

    <section class="panel" style="margin-top:22px">
        <div class="panel__head">
            <h2 class="panel__title"><?= $this->element('icon', ['name' => 'ball']) ?>Goles de esta jornada</h2>
            <?= $this->Html->link(
                $this->element('icon', ['name' => 'whistle']) . 'Reporte para árbitro',
                ['controller' => 'Jugadores', 'action' => 'reporteArbitro', '?' => ['jornada_id' => $jornada->id]],
                ['class' => 'btn btn--ghost btn--sm', 'escape' => false]
            ) ?>
        </div>

        <?php if (!empty($jornada->goles)): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Jugador</th>
                            <th>Goles</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jornada->goles as $gole): ?>
                            <?php $cantidad = (int)$gole->cantidad; ?>
                            <tr>
                                <td class="cell-main" data-label="Registro">
                                    <span class="who__name">Registro #<?= $gole->id ?></span>
                                    <span class="who__meta">
                                        <?= !empty($gole->created) ? 'Cargado el ' . h($gole->created->format('d/m/Y')) : '' ?>
                                    </span>
                                </td>
                                <td data-label="Jugador">
                                    <?= $this->Html->link(
                                        'Jugador #' . (int)$gole->jugador_id,
                                        ['controller' => 'Jugadores', 'action' => 'view', $gole->jugador_id]
                                    ) ?>
                                </td>
                                <td data-label="Goles">
                                    <span class="tag tag--goals"><strong><?= $cantidad ?></strong> <?= $cantidad === 1 ? 'gol' : 'goles' ?></span>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $gole->id,
                                        'controller' => 'Goles',
                                        'confirm' => '¿Eliminar este registro de goles?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'ball']) ?></span>
                <p class="empty__title">Sin goles en esta jornada</p>
                <p class="empty__text">Registra los goles del partido para que cuenten en la tabla.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                    ['controller' => 'Goles', 'action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

    <div class="bottom-actions">
        <?= $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Volver a jornadas',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ) ?>
        <?= $this->Form->postLink(
            $this->element('icon', ['name' => 'trash']) . 'Eliminar jornada',
            ['action' => 'delete', $jornada->id],
            [
                'confirm' => '¿Eliminar la ' . $jornada->nombre . '?',
                'class' => 'btn btn--danger',
                'escape' => false,
            ]
        ) ?>
    </div>

</div>
