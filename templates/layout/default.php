<?php
/**
 * Layout principal · Torneo Infantil de Fútbol
 *
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Torneo Infantil de Fútbol';

$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

/*
 * Menú: [texto, ícono, url, ¿activo?]
 */
$gestion = [
    ['Inicio', 'home', '/', $controller === 'Pages'],
    ['Equipos', 'shield', ['controller' => 'Equipos', 'action' => 'index'], $controller === 'Equipos'],
    ['Jugadores', 'shirt', ['controller' => 'Jugadores', 'action' => 'index'], $controller === 'Jugadores' && $action !== 'reporteArbitro'],
    ['Jornadas', 'calendar', ['controller' => 'Jornadas', 'action' => 'index'], $controller === 'Jornadas'],
    ['Goles', 'ball', ['controller' => 'Goles', 'action' => 'index'], $controller === 'Goles' && $action !== 'reporteGoleadores'],
    ['Incidencias', 'card', ['controller' => 'Incidencias', 'action' => 'index'], $controller === 'Incidencias' && $action !== 'reporte'],
];

$reportes = [
    ['Goleadores', 'trophy', ['controller' => 'Goles', 'action' => 'reporteGoleadores'], $controller === 'Goles' && $action === 'reporteGoleadores'],
    ['Reporte para árbitro', 'whistle', ['controller' => 'Jugadores', 'action' => 'reporteArbitro'], $controller === 'Jugadores' && $action === 'reporteArbitro'],
    ['Reporte de incidencias', 'clipboard', ['controller' => 'Incidencias', 'action' => 'reporte'], $controller === 'Incidencias' && $action === 'reporte'],
];

/* Sección actual para la barra superior */
$seccionActual = ['Inicio', 'home'];
foreach (array_merge($gestion, $reportes) as $item) {
    if ($item[3]) {
        $seccionActual = [$item[0], $item[1]];
    }
}

/* Fecha de hoy en español */
$dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
$meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
$hoy = new \DateTimeImmutable('now', new \DateTimeZone('America/Guatemala'));
$fechaHoy = ucfirst($dias[(int)$hoy->format('w')]) . ' ' . $hoy->format('j') . ' de ' . $meses[(int)$hoy->format('n') - 1];

$renderNav = function (array $items) {
    foreach ($items as [$texto, $icono, $url, $activo]) {
        echo $this->Html->link(
            $this->element('icon', ['name' => $icono]) . '<span>' . h($texto) . '</span>',
            $url,
            [
                'class' => 'nav-link' . ($activo ? ' is-active' : ''),
                'escape' => false,
                'aria-current' => $activo ? 'page' : null,
            ]
        );
    }
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0d1a33">
    <title>
        <?= $this->fetch('title') ? h($this->fetch('title')) . ' · ' : '' ?><?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('torneo') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="app">

<aside class="sidebar" id="sidebar" aria-label="Menú principal">
    <svg class="sidebar__pitch" viewBox="0 0 400 330" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <rect x="20" y="20" width="360" height="400" rx="4"/>
        <circle cx="200" cy="20" r="70"/>
        <rect x="110" y="250" width="180" height="120"/>
        <rect x="155" y="300" width="90" height="70"/>
        <circle cx="200" cy="20" r="4" fill="currentColor"/>
    </svg>

    <?= $this->Html->link(
        '<span class="brand-mark">' . $this->element('icon', ['name' => 'ball']) . '</span>
         <span><span class="brand-name">Torneo Infantil</span><span class="brand-tag">Gestión del campeonato</span></span>',
        '/',
        ['class' => 'sidebar__brand', 'escape' => false]
    ) ?>

    <nav class="sidebar__nav">
        <div class="nav-group">
            <p class="nav-group__title">Gestión</p>
            <?php $renderNav($gestion); ?>
        </div>
        <div class="nav-group">
            <p class="nav-group__title">Reportes</p>
            <?php $renderNav($reportes); ?>
        </div>
    </nav>

    <div class="sidebar__foot">
        Temporada <?= $hoy->format('Y') ?>
    </div>
</aside>

<div class="scrim" id="scrim"></div>

<div class="shell">
    <header class="topbar">
        <button type="button" class="topbar__menu" id="menuToggle" aria-label="Abrir menú" aria-controls="sidebar" aria-expanded="false">
            <?= $this->element('icon', ['name' => 'menu']) ?>
        </button>

        <?= $this->Html->link(
            '<span class="brand-mark">' . $this->element('icon', ['name' => 'ball']) . '</span>Torneo Infantil',
            '/',
            ['class' => 'topbar__brand', 'escape' => false]
        ) ?>

        <div class="topbar__section">
            <?= $this->element('icon', ['name' => $seccionActual[1]]) ?>
            <?= h($seccionActual[0]) ?>
        </div>

        <div class="topbar__date">
            <?= $this->element('icon', ['name' => 'clock', 'class' => 'icon--sm']) ?>
            <span><?= h($fechaHoy) ?></span>
        </div>
    </header>

    <main class="main" id="contenido">
        <div class="toasts" aria-live="polite">
            <?= $this->Flash->render() ?>
        </div>

        <?= $this->fetch('content') ?>
    </main>

    <footer class="app-footer">
        <span>Torneo Infantil de Fútbol</span>
        <span>Desarrollado con CakePHP</span>
    </footer>
</div>

<?= $this->Html->script('torneo') ?>
<?= $this->fetch('script') ?>
</body>
</html>
