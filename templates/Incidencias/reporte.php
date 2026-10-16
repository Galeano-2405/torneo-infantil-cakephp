<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 * @var \Cake\Collection\CollectionInterface|string[] $jugadores
 * @var int|string|null $equipoId
 * @var int|string|null $jugadorId
 * @var iterable $incidenciasReporte
 */

$filas = [];
foreach ($incidenciasReporte as $inc) {
    $filas[] = $inc;
}
$amarillas = 0;
$rojas = 0;
$conSuspension = 0;
foreach ($filas as $inc) {
    $inc->tipo_tarjeta === 'Roja' ? $rojas++ : $amarillas++;
    if (!empty($inc->fecha_suspension)) {
        $conSuspension++;
    }
}
$hayFiltros = !empty($equipoId) || !empty($jugadorId);
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Reporte de incidencias',
        'lead' => 'Filtra por equipo o jugador para revisar su historial disciplinario.',
        'icon' => 'clipboard',
        'tone' => 'red',
        'actions' => $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Incidencias',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ),
    ]) ?>

    <section class="panel filter-panel">
        <div class="panel__body">
            <?= $this->Form->create(null, ['type' => 'get']) ?>
                <div class="filter-bar">
                    <?= $this->Form->control('equipo_id', [
                        'label' => 'Equipo',
                        'options' => $equipos,
                        'empty' => 'Todos los equipos',
                        'value' => $equipoId,
                    ]) ?>
                    <?= $this->Form->control('jugador_id', [
                        'label' => 'Jugador',
                        'options' => $jugadores,
                        'empty' => 'Todos los jugadores',
                        'value' => $jugadorId,
                    ]) ?>
                    <div class="filter-bar__actions">
                        <?= $this->Form->button(
                            $this->element('icon', ['name' => 'filter']) . 'Consultar',
                            ['class' => 'btn btn--primary', 'escapeTitle' => false, 'type' => 'submit']
                        ) ?>
                        <?php if ($hayFiltros): ?>
                            <?= $this->Html->link(
                                $this->element('icon', ['name' => 'refresh']) . 'Limpiar',
                                ['action' => 'reporte'],
                                ['class' => 'btn btn--ghost', 'escape' => false]
                            ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </section>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Resultados</h2>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                <span class="count-chip"><span class="ref-card ref-card--amarilla"><strong><?= $amarillas ?></strong></span> amarillas</span>
                <span class="count-chip"><span class="ref-card ref-card--roja"><strong><?= $rojas ?></strong></span> rojas</span>
                <span class="count-chip"><strong><?= $conSuspension ?></strong> con suspensión</span>
            </div>
        </div>

        <?php if (!empty($filas)): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jugador</th>
                            <th>Equipo</th>
                            <th>Tarjeta</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Suspendido para</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filas as $incidencia): ?>
                            <?php
                            $jugador = $incidencia->jugador ?? null;
                            $nombreCompleto = $jugador
                                ? $jugador->nombres . ' ' . $jugador->apellidos
                                : 'Jugador #' . $incidencia->jugador_id;
                            $esRoja = $incidencia->tipo_tarjeta === 'Roja';
                            ?>
                            <tr>
                                <td class="cell-main" data-label="Jugador">
                                    <div class="who">
                                        <?= $this->element('avatar', ['foto' => $jugador->fotografia ?? null, 'nombre' => $nombreCompleto]) ?>
                                        <?= $this->Html->link(
                                            h($nombreCompleto),
                                            ['controller' => 'Jugadores', 'action' => 'view', $incidencia->jugador_id],
                                            ['class' => 'who__name', 'escape' => false]
                                        ) ?>
                                    </div>
                                </td>
                                <td data-label="Equipo">
                                    <?= h($jugador->equipo->nombre ?? 'Sin equipo') ?>
                                </td>
                                <td data-label="Tarjeta">
                                    <span class="ref-card ref-card--<?= $esRoja ? 'roja' : 'amarilla' ?>"><?= $esRoja ? 'Roja' : 'Amarilla' ?></span>
                                </td>
                                <td class="cell-block" data-label="Motivo"><?= h($incidencia->descripcion) ?></td>
                                <td data-label="Fecha">
                                    <?= !empty($incidencia->fecha_incidencia) ? h($incidencia->fecha_incidencia->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td data-label="Suspendido para">
                                    <?php if (!empty($incidencia->fecha_suspension)): ?>
                                        <span class="tag tag--ban"><?= $this->element('icon', ['name' => 'ban']) ?><?= h($incidencia->fecha_suspension->format('d/m/Y')) ?></span>
                                    <?php else: ?>
                                        <span class="muted">Sin suspensión</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'search']) ?></span>
                <p class="empty__title">Sin resultados</p>
                <p class="empty__text">
                    <?= $hayFiltros
                        ? 'No hay incidencias con estos filtros. Prueba con otro equipo o jugador.'
                        : 'Todavía no hay incidencias registradas en el torneo.' ?>
                </p>
                <?php if ($hayFiltros): ?>
                    <?= $this->Html->link(
                        $this->element('icon', ['name' => 'refresh']) . 'Limpiar filtros',
                        ['action' => 'reporte'],
                        ['class' => 'btn btn--ghost', 'escape' => false]
                    ) ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

</div>
