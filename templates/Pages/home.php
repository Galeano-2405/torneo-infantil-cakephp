<?php
/**
 * Inicio · Torneo Infantil de Fútbol
 *
 * @var \App\View\AppView $this
 */

use Cake\I18n\Date;
use Cake\ORM\TableRegistry;

$this->assign('title', 'Inicio');

/*
 * Totales para el marcador.
 * Solo lectura: si la base no responde, la página se muestra igual.
 */
$totales = ['equipos' => 0, 'jugadores' => 0, 'jornadas' => 0, 'goles' => 0];
$proximaJornada = null;

try {
    $locator = TableRegistry::getTableLocator();

    $totales['equipos'] = $locator->get('Equipos')->find()->count();
    $totales['jugadores'] = $locator->get('Jugadores')->find()->count();
    $totales['jornadas'] = $locator->get('Jornadas')->find()->count();

    $golesQuery = $locator->get('Goles')->find();
    $sumaGoles = $golesQuery
        ->select(['total' => $golesQuery->func()->sum('cantidad')])
        ->disableHydration()
        ->first();
    $totales['goles'] = (int)($sumaGoles['total'] ?? 0);

    $proximaJornada = $locator->get('Jornadas')
        ->find()
        ->where(['fecha >=' => Date::today()])
        ->orderBy(['fecha' => 'ASC'])
        ->first();
} catch (\Throwable $e) {
    // El marcador queda en cero; el resto del inicio funciona normal.
}

$modulos = [
    [
        'titulo' => 'Equipos',
        'texto' => 'Los equipos inscritos en el torneo.',
        'icono' => 'shield',
        'tono' => '',
        'url' => ['controller' => 'Equipos', 'action' => 'index'],
        'rapido' => ['Nuevo equipo', ['controller' => 'Equipos', 'action' => 'add']],
        'ancho' => true,
    ],
    [
        'titulo' => 'Jugadores',
        'texto' => 'Datos, fotografía y equipo de cada niño o niña.',
        'icono' => 'shirt',
        'tono' => 'module--night',
        'url' => ['controller' => 'Jugadores', 'action' => 'index'],
        'rapido' => ['Inscribir jugador', ['controller' => 'Jugadores', 'action' => 'add']],
        'ancho' => true,
    ],
    [
        'titulo' => 'Jornadas',
        'texto' => 'El calendario de fechas del campeonato.',
        'icono' => 'calendar',
        'tono' => 'module--turf',
        'url' => ['controller' => 'Jornadas', 'action' => 'index'],
        'rapido' => ['Nueva jornada', ['controller' => 'Jornadas', 'action' => 'add']],
        'ancho' => false,
    ],
    [
        'titulo' => 'Goles',
        'texto' => 'Anotaciones de cada jugador por jornada.',
        'icono' => 'ball',
        'tono' => 'module--gold',
        'url' => ['controller' => 'Goles', 'action' => 'index'],
        'rapido' => ['Registrar goles', ['controller' => 'Goles', 'action' => 'add']],
        'ancho' => false,
    ],
    [
        'titulo' => 'Incidencias',
        'texto' => 'Tarjetas amarillas, rojas y suspensiones.',
        'icono' => 'card',
        'tono' => 'module--red',
        'url' => ['controller' => 'Incidencias', 'action' => 'index'],
        'rapido' => ['Nueva incidencia', ['controller' => 'Incidencias', 'action' => 'add']],
        'ancho' => false,
    ],
];

$reportes = [
    ['Goleadores', 'Quién va arriba en la tabla', 'trophy', ['controller' => 'Goles', 'action' => 'reporteGoleadores']],
    ['Reporte para árbitro', 'Habilitados y suspendidos por jornada', 'whistle', ['controller' => 'Jugadores', 'action' => 'reporteArbitro']],
    ['Reporte de incidencias', 'Historial por equipo y jugador', 'clipboard', ['controller' => 'Incidencias', 'action' => 'reporte']],
];

$marcador = [
    ['equipos', 'Equipos', 'shield', ['controller' => 'Equipos', 'action' => 'index']],
    ['jugadores', 'Jugadores', 'shirt', ['controller' => 'Jugadores', 'action' => 'index']],
    ['jornadas', 'Jornadas', 'calendar', ['controller' => 'Jornadas', 'action' => 'index']],
    ['goles', 'Goles anotados', 'ball', ['controller' => 'Goles', 'action' => 'reporteGoleadores']],
];
?>
<div class="reveal">

    <section class="hero" aria-labelledby="heroTitle">
        <!-- Cancha dibujada con cal -->
        <svg class="hero__pitch" viewBox="0 0 1200 560" preserveAspectRatio="xMidYMid slice" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path class="chalk" d="M40 40 H1160 V700 H40 Z"/>
            <path class="chalk" d="M600 40 V700"/>
            <circle class="chalk" cx="600" cy="370" r="110"/>
            <path class="chalk" d="M40 190 H220 V550 H40"/>
            <path class="chalk" d="M1160 190 H980 V550 H1160"/>
            <path class="chalk" d="M40 280 H110 V460 H40"/>
            <path class="chalk" d="M1160 280 H1090 V460 H1160"/>
            <path class="chalk" d="M220 300 A90 90 0 0 1 220 440"/>
            <path class="chalk" d="M980 300 A90 90 0 0 0 980 440"/>
        </svg>

        <div class="hero__ball"><?= $this->element('icon', ['name' => 'ball']) ?></div>

        <div class="hero__content">
            <h1 class="hero__title" id="heroTitle">Torneo Infantil <span>de Fútbol</span></h1>
            <p class="hero__lead">
                Inscribe equipos y jugadores, registra los goles de cada jornada
                y lleva el control de tarjetas y suspensiones.
            </p>

            <div class="hero__actions">
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                    ['controller' => 'Goles', 'action' => 'add'],
                    ['class' => 'btn btn--gold', 'escape' => false]
                ) ?>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'whistle']) . 'Reporte para árbitro',
                    ['controller' => 'Jugadores', 'action' => 'reporteArbitro'],
                    ['class' => 'btn btn--on-dark', 'escape' => false]
                ) ?>
            </div>

            <?php if (!empty($proximaJornada)): ?>
                <div class="next-match">
                    <span class="next-match__icon"><?= $this->element('icon', ['name' => 'calendar']) ?></span>
                    <span>
                        <small>Próxima jornada</small>
                        <strong>
                            <?= h($proximaJornada->nombre) ?>,
                            <?= h($proximaJornada->fecha->format('d/m/Y')) ?>
                        </strong>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <div class="scoreboard">
            <?php foreach ($marcador as [$clave, $texto, $icono, $url]): ?>
                <?= $this->Html->link(
                    '<span class="scoreboard__value" data-count="' . (int)$totales[$clave] . '">' . (int)$totales[$clave] . '</span>
                     <span class="scoreboard__label">' . $this->element('icon', ['name' => $icono, 'class' => 'icon--sm']) . h($texto) . '</span>',
                    $url,
                    ['class' => 'scoreboard__cell', 'escape' => false]
                ) ?>
            <?php endforeach; ?>
        </div>
    </section>

    <div>
        <div class="section-head">
            <h2 class="section-title">Administrar el torneo</h2>
            <p class="section-text">Elige un módulo para ver, crear o editar registros.</p>
        </div>

        <div class="modules">
            <?php foreach ($modulos as $m): ?>
                <article class="module <?= $m['tono'] ?> <?= $m['ancho'] ? 'module--wide' : '' ?>">
                    <span class="module__icon"><?= $this->element('icon', ['name' => $m['icono']]) ?></span>
                    <div>
                        <h3 class="module__title">
                            <?= $this->Html->link($m['titulo'], $m['url'], ['class' => 'stretch', 'style' => 'color:inherit']) ?>
                        </h3>
                        <p class="module__text"><?= h($m['texto']) ?></p>
                    </div>
                    <div class="module__foot">
                        <?= $this->Html->link(
                            $this->element('icon', ['name' => 'plus', 'class' => 'icon--sm']) . h($m['rapido'][0]),
                            $m['rapido'][1],
                            ['class' => 'module__quick', 'escape' => false]
                        ) ?>
                        <?= $this->element('icon', ['name' => 'arrow-right']) ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div>
        <div class="section-head">
            <h2 class="section-title">Reportes</h2>
            <p class="section-text">Consultas listas para el día de partido.</p>
        </div>

        <div class="reports">
            <?php foreach ($reportes as [$titulo, $texto, $icono, $url]): ?>
                <?= $this->Html->link(
                    '<span class="report-tile__icon">' . $this->element('icon', ['name' => $icono]) . '</span>
                     <span class="report-tile__text"><strong>' . h($titulo) . '</strong><span>' . h($texto) . '</span></span>',
                    $url,
                    ['class' => 'report-tile', 'escape' => false]
                ) ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>
