<?php
/**
 * Layout principal
 *
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Torneo Infantil de Fútbol';

$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');

$isHome =
    $currentController === 'Pages';

$isEquipos =
    $currentController === 'Equipos';

$isJugadores =
    $currentController === 'Jugadores'
    && $currentAction !== 'reporteArbitro';

$isJornadas =
    $currentController === 'Jornadas';

$isGoles =
    $currentController === 'Goles'
    && $currentAction !== 'reporteGoleadores';

$isIncidencias =
    $currentController === 'Incidencias'
    && $currentAction !== 'reporte';

$isReportes =
    ($currentController === 'Goles' && $currentAction === 'reporteGoleadores')
    ||
    ($currentController === 'Jugadores' && $currentAction === 'reporteArbitro')
    ||
    ($currentController === 'Incidencias' && $currentAction === 'reporte');
?>

<!DOCTYPE html>

<html lang="es">

<head>

    <?= $this->Html->charset() ?>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ? ' - ' . $this->fetch('title') : '' ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'normalize.min',
        'milligram.min',
        'fonts',
        'cake',
        'app'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>


<body>

<header class="app-header">

    <nav class="app-nav">

        <!-- LOGO / MARCA -->

        <?= $this->Html->link(
            '
            <div class="brand-icon">
                ⚽
            </div>

            <div class="brand-text">
                <span class="brand-title">
                    Torneo Infantil
                </span>

                <span class="brand-subtitle">
                    Gestión deportiva
                </span>
            </div>
            ',
            '/',
            [
                'class' => 'app-brand',
                'escape' => false
            ]
        ) ?>


        <!-- BOTÓN MENÚ MÓVIL -->

        <button
            type="button"
            class="menu-toggle"
            id="menuToggle"
            aria-label="Abrir menú"
            aria-expanded="false"
        >
            ☰
        </button>


        <!-- MENÚ PRINCIPAL -->

        <div
            class="app-menu"
            id="appMenu"
        >

            <?= $this->Html->link(
                'Inicio',
                '/',
                [
                    'class' => $isHome ? 'active' : ''
                ]
            ) ?>


            <?= $this->Html->link(
                'Equipos',
                [
                    'controller' => 'Equipos',
                    'action' => 'index'
                ],
                [
                    'class' => $isEquipos ? 'active' : ''
                ]
            ) ?>


            <?= $this->Html->link(
                'Jugadores',
                [
                    'controller' => 'Jugadores',
                    'action' => 'index'
                ],
                [
                    'class' => $isJugadores ? 'active' : ''
                ]
            ) ?>


            <?= $this->Html->link(
                'Jornadas',
                [
                    'controller' => 'Jornadas',
                    'action' => 'index'
                ],
                [
                    'class' => $isJornadas ? 'active' : ''
                ]
            ) ?>


            <?= $this->Html->link(
                'Goles',
                [
                    'controller' => 'Goles',
                    'action' => 'index'
                ],
                [
                    'class' => $isGoles ? 'active' : ''
                ]
            ) ?>


            <?= $this->Html->link(
                'Incidencias',
                [
                    'controller' => 'Incidencias',
                    'action' => 'index'
                ],
                [
                    'class' => $isIncidencias ? 'active' : ''
                ]
            ) ?>


            <!-- REPORTES DROPDOWN -->

           <div class="nav-dropdown">

    <button
        type="button"
        class="nav-dropdown-button <?= $isReportes ? 'active' : '' ?>"
        id="reportsToggle"
        aria-expanded="false"
        aria-controls="reportsMenu"
    >

        <span class="nav-dropdown-label">
            Reportes
        </span>

        <span
            class="dropdown-arrow"
            aria-hidden="true"
        >
            ⌄
        </span>

    </button>


                <div
                    class="nav-dropdown-menu"
                    id="reportsMenu"
                >

                    <!-- GOLEADORES -->

                    <?= $this->Html->link(
                        '
                        <span class="dropdown-icon">
                            🏆
                        </span>

                        <span>
                            <strong>
                                Goleadores
                            </strong>

                            <small>
                                Ranking del torneo
                            </small>
                        </span>
                        ',
                        [
                            'controller' => 'Goles',
                            'action' => 'reporteGoleadores'
                        ],
                        [
                            'escape' => false,
                            'class' =>
                                (
                                    $currentController === 'Goles'
                                    &&
                                    $currentAction === 'reporteGoleadores'
                                )
                                ? 'active'
                                : ''
                        ]
                    ) ?>


                    <!-- REPORTE ÁRBITRO -->

                    <?= $this->Html->link(
                        '
                        <span class="dropdown-icon">
                            ⚖️
                        </span>

                        <span>
                            <strong>
                                Reporte para Árbitro
                            </strong>

                            <small>
                                Habilitados y suspendidos
                            </small>
                        </span>
                        ',
                        [
                            'controller' => 'Jugadores',
                            'action' => 'reporteArbitro'
                        ],
                        [
                            'escape' => false,
                            'class' =>
                                (
                                    $currentController === 'Jugadores'
                                    &&
                                    $currentAction === 'reporteArbitro'
                                )
                                ? 'active'
                                : ''
                        ]
                    ) ?>


                    <!-- REPORTE INCIDENCIAS -->

                    <?= $this->Html->link(
                        '
                        <span class="dropdown-icon">
                            📋
                        </span>

                        <span>
                            <strong>
                                Incidencias
                            </strong>

                            <small>
                                Tarjetas y suspensiones
                            </small>
                        </span>
                        ',
                        [
                            'controller' => 'Incidencias',
                            'action' => 'reporte'
                        ],
                        [
                            'escape' => false,
                            'class' =>
                                (
                                    $currentController === 'Incidencias'
                                    &&
                                    $currentAction === 'reporte'
                                )
                                ? 'active'
                                : ''
                        ]
                    ) ?>

                </div>

            </div>

        </div>

    </nav>

</header>


<!-- CONTENIDO PRINCIPAL -->

<main class="main">

    <div class="container">

        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

    </div>

</main>


<!-- FOOTER -->

<footer class="app-footer">

    Torneo Infantil de Fútbol ·
    Sistema desarrollado con CakePHP

</footer>


<!-- JAVASCRIPT -->

<script>

    /* =====================================================
       MENÚ MÓVIL
       ===================================================== */

    const menuToggle =
        document.getElementById('menuToggle');

    const appMenu =
        document.getElementById('appMenu');


    if (menuToggle && appMenu) {

        menuToggle.addEventListener(
            'click',
            function () {

                const abierto =
                    appMenu.classList.toggle('open');

                menuToggle.setAttribute(
                    'aria-expanded',
                    abierto ? 'true' : 'false'
                );

                menuToggle.textContent =
                    abierto ? '✕' : '☰';

            }
        );


        appMenu
            .querySelectorAll('a')
            .forEach(function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        /*
                         * En móvil cerramos el menú
                         * después de seleccionar una opción.
                         */
                        appMenu.classList.remove('open');

                        menuToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                        menuToggle.textContent = '☰';

                    }
                );

            });

    }


    /* =====================================================
       DROPDOWN REPORTES
       ===================================================== */

    const reportsToggle =
        document.getElementById('reportsToggle');

    const reportsMenu =
        document.getElementById('reportsMenu');

    const navDropdown =
        reportsToggle
            ? reportsToggle.closest('.nav-dropdown')
            : null;


    if (reportsToggle && navDropdown) {

        reportsToggle.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                const abierto =
                    navDropdown.classList.toggle('open');

                reportsToggle.setAttribute(
                    'aria-expanded',
                    abierto ? 'true' : 'false'
                );

            }
        );


        /*
         * Cerrar dropdown al hacer clic fuera.
         */
        document.addEventListener(
            'click',
            function (event) {

                if (
                    navDropdown &&
                    !navDropdown.contains(event.target)
                ) {

                    navDropdown.classList.remove('open');

                    reportsToggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }

            }
        );


        /*
         * Evita que hacer clic dentro del dropdown
         * lo cierre accidentalmente antes de navegar.
         */
        if (reportsMenu) {

            reportsMenu.addEventListener(
                'click',
                function (event) {

                    event.stopPropagation();

                }
            );

        }

    }


    /* =====================================================
       ESCAPE CIERRA LOS MENÚS
       ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                if (appMenu) {

                    appMenu.classList.remove('open');

                }

                if (menuToggle) {

                    menuToggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                    menuToggle.textContent = '☰';

                }

                if (navDropdown) {

                    navDropdown.classList.remove('open');

                }

                if (reportsToggle) {

                    reportsToggle.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }

            }

        }
    );

</script>


<?= $this->fetch('script') ?>

</body>

</html>