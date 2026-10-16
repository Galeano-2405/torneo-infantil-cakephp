<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Incidencia> $incidencias
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Incidencias',
        'lead' => 'Tarjetas amarillas, rojas y suspensiones de los jugadores.',
        'icon' => 'card',
        'tone' => 'red',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'clipboard']) . 'Ver reporte',
                ['action' => 'reporte'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'plus']) . 'Nueva incidencia',
                ['action' => 'add'],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Historial disciplinario</h2>
            <span class="count-chip"><strong><?= $this->Paginator->param('count') ?? count($incidencias) ?></strong> incidencias</span>
        </div>

        <?php if (count($incidencias) > 0): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jugador</th>
                            <th>Tarjeta</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Suspendido para</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($incidencias as $incidencia): ?>
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
                                        <?= $this->element('avatar', [
                                            'foto' => $jugador->fotografia ?? null,
                                            'nombre' => $nombreCompleto,
                                        ]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($nombreCompleto),
                                                ['controller' => 'Jugadores', 'action' => 'view', $incidencia->jugador_id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">
                                                <?= !empty($jugador->equipo) ? h($jugador->equipo->nombre) : 'Sin equipo' ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Tarjeta">
                                    <span class="ref-card ref-card--<?= $esRoja ? 'roja' : 'amarilla' ?>">
                                        <?= $esRoja ? 'Roja' : 'Amarilla' ?>
                                    </span>
                                </td>
                                <td class="cell-block" data-label="Motivo">
                                    <?= h($incidencia->descripcion) ?>
                                </td>
                                <td data-label="Fecha">
                                    <?= !empty($incidencia->fecha_incidencia)
                                        ? h($incidencia->fecha_incidencia->format('d/m/Y'))
                                        : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td data-label="Suspendido para">
                                    <?php if (!empty($incidencia->fecha_suspension)): ?>
                                        <span class="tag tag--ban">
                                            <?= $this->element('icon', ['name' => 'ban']) ?>
                                            <?= h($incidencia->fecha_suspension->format('d/m/Y')) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="muted">Sin suspensión</span>
                                    <?php endif; ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $incidencia->id,
                                        'confirm' => '¿Eliminar esta incidencia?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->element('pager', ['nombre' => 'incidencias']) ?>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'card']) ?></span>
                <p class="empty__title">Sin incidencias registradas</p>
                <p class="empty__text">Cuando un jugador reciba una tarjeta, regístrala aquí.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Nueva incidencia',
                    ['action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
