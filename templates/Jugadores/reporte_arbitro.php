<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 * @var mixed $jornadaSeleccionada
 * @var array $equiposReporte
 * @var array $suspendidos
 */

$meses = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];

/* Conteo de habilitados y suspendidos (solo para mostrar) */
$totalJugadores = 0;
$totalSuspendidos = 0;
foreach ($equiposReporte as $jugadoresEquipo) {
    foreach ($jugadoresEquipo as $j) {
        $totalJugadores++;
        if (!empty($suspendidos[(int)$j->id])) {
            $totalSuspendidos++;
        }
    }
}
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Reporte para árbitro',
        'lead' => 'Elige una jornada para ver qué jugadores pueden jugar y quiénes están suspendidos.',
        'icon' => 'whistle',
        'actions' => !empty($jornadaSeleccionada)
            ? '<button type="button" class="btn btn--ghost" onclick="window.print()">' . $this->element('icon', ['name' => 'clipboard']) . 'Imprimir planilla</button>'
            : null,
    ]) ?>

    <section class="panel filter-panel">
        <div class="panel__body">
            <?= $this->Form->create(null, [
                'type' => 'get',
                'url' => ['controller' => 'Jugadores', 'action' => 'reporteArbitro'],
            ]) ?>
                <div class="filter-bar">
                    <?= $this->Form->control('jornada_id', [
                        'label' => 'Jornada',
                        'options' => $jornadas,
                        'empty' => 'Selecciona una jornada',
                        'value' => $this->request->getQuery('jornada_id'),
                    ]) ?>
                    <div class="filter-bar__actions">
                        <?= $this->Form->button(
                            $this->element('icon', ['name' => 'search']) . 'Consultar jornada',
                            ['class' => 'btn btn--primary', 'escapeTitle' => false, 'type' => 'submit']
                        ) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </section>

    <?php if (!empty($jornadaSeleccionada)): ?>

        <section class="matchday">
            <div class="matchday__date">
                <?php if (!empty($jornadaSeleccionada->fecha)): ?>
                    <small><?= $meses[(int)$jornadaSeleccionada->fecha->format('n') - 1] ?> <?= $jornadaSeleccionada->fecha->format('Y') ?></small>
                    <strong><?= $jornadaSeleccionada->fecha->format('d') ?></strong>
                <?php else: ?>
                    <small>Sin fecha</small><strong>–</strong>
                <?php endif; ?>
            </div>
            <div>
                <h2><?= h($jornadaSeleccionada->nombre) ?></h2>
                <?php if (!empty($jornadaSeleccionada->fecha)): ?>
                    <p>Partidos del <?= h($jornadaSeleccionada->fecha->format('d/m/Y')) ?></p>
                <?php endif; ?>
            </div>
            <div class="matchday__stats">
                <div class="matchday__stat matchday__stat--ok">
                    <strong><?= $totalJugadores - $totalSuspendidos ?></strong>
                    <span>habilitados</span>
                </div>
                <div class="matchday__stat matchday__stat--ban">
                    <strong><?= $totalSuspendidos ?></strong>
                    <span>suspendidos</span>
                </div>
            </div>
        </section>

        <?php if (!empty($equiposReporte)): ?>
            <div class="team-sheets">
                <?php foreach ($equiposReporte as $equipoNombre => $jugadores): ?>
                    <section class="panel">
                        <div class="panel__head">
                            <div class="who">
                                <?= $this->element('crest', ['nombre' => $equipoNombre]) ?>
                                <h2 class="panel__title"><?= h($equipoNombre) ?></h2>
                            </div>
                            <span class="count-chip">
                                <strong><?= count($jugadores) ?></strong>
                                <?= count($jugadores) === 1 ? 'jugador' : 'jugadores' ?>
                            </span>
                        </div>

                        <?php foreach ($jugadores as $jugador): ?>
                            <?php
                            $estaSuspendido = !empty($suspendidos[(int)$jugador->id]);
                            $nombreCompleto = $jugador->nombres . ' ' . $jugador->apellidos;
                            ?>
                            <div class="sheet-row <?= $estaSuspendido ? 'is-banned' : '' ?>">
                                <?= $this->element('avatar', ['foto' => $jugador->fotografia, 'nombre' => $nombreCompleto]) ?>
                                <div>
                                    <span class="who__name"><?= h($nombreCompleto) ?></span>
                                    <span class="who__meta">
                                        Nació el <?= !empty($jugador->fecha_nacimiento) ? h($jugador->fecha_nacimiento->format('d/m/Y')) : 'sin fecha' ?>
                                    </span>
                                </div>
                                <?php if ($estaSuspendido): ?>
                                    <span class="tag tag--ban"><?= $this->element('icon', ['name' => 'ban']) ?>Suspendido</span>
                                <?php else: ?>
                                    <span class="tag tag--ok"><?= $this->element('icon', ['name' => 'check']) ?>Habilitado</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </section>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <section class="panel" style="margin-top:22px">
                <div class="empty">
                    <span class="empty__icon"><?= $this->element('icon', ['name' => 'users']) ?></span>
                    <p class="empty__title">No hay jugadores inscritos</p>
                    <p class="empty__text">Inscribe jugadores en sus equipos para armar la planilla del árbitro.</p>
                </div>
            </section>
        <?php endif; ?>

    <?php else: ?>
        <section class="panel" style="margin-top:22px">
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'whistle']) ?></span>
                <p class="empty__title">Elige una jornada</p>
                <p class="empty__text">Selecciona la jornada arriba y presiona «Consultar jornada» para ver la planilla de cada equipo.</p>
            </div>
        </section>
    <?php endif; ?>

</div>
