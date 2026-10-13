<?php
/**
 * Home premium
 *
 * @var \App\View\AppView $this
 */
?>

<div class="home-pro">

    <!-- HERO -->
    <section class="hero-pro">
        <div class="hero-pro-content">

            <div class="hero-badge">
                ⚽ Plataforma deportiva · CakePHP
            </div>

            <h1>
                Torneo Infantil
            </h1>

            <p>
                Administra equipos, jugadores, jornadas, goles,
                incidencias y reportes desde una plataforma moderna,
                responsiva y lista para publicarse en hosting.
            </p>

            <div class="hero-actions">
                <?= $this->Html->link(
                    'Ver jugadores',
                    ['controller' => 'Jugadores', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>

                <?= $this->Html->link(
                    'Ver reportes',
                    ['controller' => 'Goles', 'action' => 'reporteGoleadores'],
                    ['class' => 'button button-outline']
                ) ?>
            </div>

            <div class="hero-mini-stats">
                <div class="hero-mini-card">
                    <strong>5 módulos</strong>
                    <span>Gestión principal</span>
                </div>

                <div class="hero-mini-card">
                    <strong>3 reportes</strong>
                    <span>Consultas importantes</span>
                </div>

                <div class="hero-mini-card">
                    <strong>100% responsive</strong>
                    <span>Compatible con celular</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ACCESOS RÁPIDOS -->
    <section>
        <div class="section-header-pro">
            <div>
                <h2>Accesos rápidos</h2>
                <p>Acciones principales del sistema</p>
            </div>
        </div>

        <div class="quick-links-pro">

            <?= $this->Html->link(
                '<div class="quick-link-box">
                    <div class="quick-link-icon">👤</div>
                    <div class="quick-link-text">
                        <strong>Nuevo jugador</strong>
                        <span>Registrar un jugador</span>
                    </div>
                </div>',
                ['controller' => 'Jugadores', 'action' => 'add'],
                ['escape' => false]
            ) ?>

            <?= $this->Html->link(
                '<div class="quick-link-box">
                    <div class="quick-link-icon">🛡️</div>
                    <div class="quick-link-text">
                        <strong>Nuevo equipo</strong>
                        <span>Registrar un equipo</span>
                    </div>
                </div>',
                ['controller' => 'Equipos', 'action' => 'add'],
                ['escape' => false]
            ) ?>

            <?= $this->Html->link(
                '<div class="quick-link-box">
                    <div class="quick-link-icon">⚽</div>
                    <div class="quick-link-text">
                        <strong>Registrar goles</strong>
                        <span>Cargar anotaciones</span>
                    </div>
                </div>',
                ['controller' => 'Goles', 'action' => 'add'],
                ['escape' => false]
            ) ?>

            <?= $this->Html->link(
                '<div class="quick-link-box">
                    <div class="quick-link-icon">🟨</div>
                    <div class="quick-link-text">
                        <strong>Nueva incidencia</strong>
                        <span>Registrar tarjeta</span>
                    </div>
                </div>',
                ['controller' => 'Incidencias', 'action' => 'add'],
                ['escape' => false]
            ) ?>

        </div>
    </section>

    <!-- MÓDULOS -->
    <section>
        <div class="section-header-pro">
            <div>
                <h2>Módulos principales</h2>
                <p>Administración general del torneo</p>
            </div>
        </div>

        <div class="grid-pro">

            <article class="card-pro">
                <div class="card-pro-icon">🛡️</div>
                <div class="card-chip">Catálogo</div>
                <h4>Equipos</h4>
                <p>
                    Administra los equipos participantes y mantén
                    organizado el torneo.
                </p>
                <?= $this->Html->link(
                    'Ver equipos',
                    ['controller' => 'Equipos', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">👤</div>
                <div class="card-chip">Registro</div>
                <h4>Jugadores</h4>
                <p>
                    Controla datos personales, equipo asignado
                    y fotografía de cada jugador.
                </p>
                <?= $this->Html->link(
                    'Ver jugadores',
                    ['controller' => 'Jugadores', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">📅</div>
                <div class="card-chip">Planificación</div>
                <h4>Jornadas</h4>
                <p>
                    Gestiona las fechas y organiza correctamente
                    el desarrollo del campeonato.
                </p>
                <?= $this->Html->link(
                    'Ver jornadas',
                    ['controller' => 'Jornadas', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">⚽</div>
                <div class="card-chip">Resultados</div>
                <h4>Goles</h4>
                <p>
                    Registra anotaciones por jugador y jornada
                    para generar estadísticas del torneo.
                </p>
                <?= $this->Html->link(
                    'Ver goles',
                    ['controller' => 'Goles', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">🟥</div>
                <div class="card-chip">Control disciplinario</div>
                <h4>Incidencias</h4>
                <p>
                    Administra tarjetas amarillas, rojas
                    y fechas de suspensión.
                </p>
                <?= $this->Html->link(
                    'Ver incidencias',
                    ['controller' => 'Incidencias', 'action' => 'index'],
                    ['class' => 'button']
                ) ?>
            </article>

        </div>
    </section>

    <!-- REPORTES -->
    <section>
        <div class="section-header-pro">
            <div>
                <h2>Reportes</h2>
                <p>Consultas clave para control del torneo</p>
            </div>
        </div>

        <div class="grid-pro">

            <article class="card-pro">
                <div class="card-pro-icon">🏆</div>
                <div class="card-chip">Estadística</div>
                <h4>Reporte de goleadores</h4>
                <p>
                    Visualiza el ranking de goleadores del torneo
                    según la cantidad total de anotaciones.
                </p>
                <?= $this->Html->link(
                    'Ver reporte',
                    ['controller' => 'Goles', 'action' => 'reporteGoleadores'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">🧑‍⚖️</div>
                <div class="card-chip">Control</div>
                <h4>Reporte para árbitro</h4>
                <p>
                    Consulta qué jugadores están habilitados
                    o suspendidos según la jornada seleccionada.
                </p>
                <?= $this->Html->link(
                    'Ver reporte',
                    ['controller' => 'Jugadores', 'action' => 'reporteArbitro'],
                    ['class' => 'button']
                ) ?>
            </article>

            <article class="card-pro">
                <div class="card-pro-icon">📋</div>
                <div class="card-chip">Seguimiento</div>
                <h4>Reporte de incidencias</h4>
                <p>
                    Revisa el historial de faltas, tarjetas
                    e información disciplinaria de jugadores.
                </p>
                <?= $this->Html->link(
                    'Ver reporte',
                    ['controller' => 'Incidencias', 'action' => 'reporte'],
                    ['class' => 'button']
                ) ?>
            </article>

        </div>
    </section>

</div>