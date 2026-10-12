<?php
/**
 * Dashboard principal
 *
 * @var \App\View\AppView $this
 */
?>

<style>
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 25px 60px;
    }

    .dashboard-header {
        margin-bottom: 40px;
    }

    .dashboard-header h2 {
        margin-bottom: 8px;
        font-size: 38px;
        font-weight: 500;
    }

    .dashboard-header p {
        margin: 0;
        font-size: 18px;
        color: #666;
    }

    .dashboard-section {
        margin-bottom: 45px;
    }

    .dashboard-section-title {
        margin-bottom: 20px;
        font-size: 27px;
        font-weight: 500;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .dashboard-card {
        background: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 12px;
        padding: 26px;
        min-height: 245px;

        display: flex;
        flex-direction: column;

        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.10);
    }

    .dashboard-card h4 {
        margin: 0 0 14px 0;
        font-size: 25px;
        font-weight: 500;
    }

    .dashboard-card p {
        margin: 0 0 25px 0;
        color: #5f6670;
        line-height: 1.55;
        font-size: 16px;

        flex-grow: 1;
    }

    .dashboard-card .button {
        align-self: flex-start;
        margin-bottom: 0;
        min-width: 165px;
        text-align: center;
    }

    .reports-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    @media (max-width: 900px) {
        .dashboard-grid,
        .reports-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .dashboard-container {
            padding: 25px 15px 40px;
        }

        .dashboard-grid,
        .reports-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-header h2 {
            font-size: 30px;
        }

        .dashboard-card {
            min-height: auto;
        }

        .dashboard-card .button {
            width: 100%;
        }
    }
</style>


<div class="dashboard-container">

    <!-- ENCABEZADO -->

    <div class="dashboard-header">

        <h2>
            Torneo Infantil de Fútbol
        </h2>

        <p>
            Sistema de administración de jugadores, jornadas, goles e incidencias.
        </p>

    </div>


    <!-- ADMINISTRACIÓN -->

    <section class="dashboard-section">

        <h3 class="dashboard-section-title">
            Administración
        </h3>

        <div class="dashboard-grid">


            <!-- EQUIPOS -->

            <div class="dashboard-card">

                <h4>
                    Equipos
                </h4>

                <p>
                    Administración del catálogo de equipos participantes.
                </p>

                <?= $this->Html->link(
                    'Ver Equipos',
                    [
                        'controller' => 'Equipos',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- JUGADORES -->

            <div class="dashboard-card">

                <h4>
                    Jugadores
                </h4>

                <p>
                    Registro de jugadores, fotografía y equipo participante.
                </p>

                <?= $this->Html->link(
                    'Ver Jugadores',
                    [
                        'controller' => 'Jugadores',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- JORNADAS -->

            <div class="dashboard-card">

                <h4>
                    Jornadas
                </h4>

                <p>
                    Administración de jornadas y fechas programadas del torneo.
                </p>

                <?= $this->Html->link(
                    'Ver Jornadas',
                    [
                        'controller' => 'Jornadas',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- GOLES -->

            <div class="dashboard-card">

                <h4>
                    Goles
                </h4>

                <p>
                    Registro de goles anotados por jugador en cada jornada.
                </p>

                <?= $this->Html->link(
                    'Ver Goles',
                    [
                        'controller' => 'Goles',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- INCIDENCIAS -->

            <div class="dashboard-card">

                <h4>
                    Incidencias
                </h4>

                <p>
                    Registro de tarjetas amarillas, rojas y fechas de suspensión.
                </p>

                <?= $this->Html->link(
                    'Ver Incidencias',
                    [
                        'controller' => 'Incidencias',
                        'action' => 'index'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>

    </section>


    <!-- REPORTES -->

    <section class="dashboard-section">

        <h3 class="dashboard-section-title">
            Reportes
        </h3>

        <div class="dashboard-grid reports-grid">


            <!-- GOLEADORES -->

            <div class="dashboard-card">

                <h4>
                    Goleadores
                </h4>

                <p>
                    Ranking de jugadores ordenados según el total de goles anotados.
                </p>

                <?= $this->Html->link(
                    'Ver Reporte',
                    [
                        'controller' => 'Goles',
                        'action' => 'reporteGoleadores'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- ÁRBITRO -->

            <div class="dashboard-card">

                <h4>
                    Reporte para Árbitro
                </h4>

                <p>
                    Consulta los jugadores habilitados o suspendidos por jornada.
                </p>

                <?= $this->Html->link(
                    'Ver Reporte',
                    [
                        'controller' => 'Jugadores',
                        'action' => 'reporteArbitro'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>


            <!-- INCIDENCIAS -->

            <div class="dashboard-card">

                <h4>
                    Reporte de Incidencias
                </h4>

                <p>
                    Consulta las incidencias registradas por equipo y jugador.
                </p>

                <?= $this->Html->link(
                    'Ver Reporte',
                    [
                        'controller' => 'Incidencias',
                        'action' => 'reporte'
                    ],
                    [
                        'class' => 'button'
                    ]
                ) ?>

            </div>

        </div>

    </section>

</div>