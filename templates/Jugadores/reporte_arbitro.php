<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 * @var mixed $jornadaSeleccionada
 * @var array $equiposReporte
 * @var array $suspendidos
 */
?>

<div class="referee-report-page">

    <!-- HEADER -->
    <div class="report-page-header">

        <div>

            <div class="report-kicker">
                Control de participación
            </div>

            <h1>
                Reporte para Árbitro
            </h1>

            <p>
                Consulta los jugadores habilitados o suspendidos por jornada.
            </p>

        </div>

        <div class="report-header-actions">

            <?= $this->Html->link(
                '← Volver a jugadores',
                [
                    'controller' => 'Jugadores',
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>

        </div>

    </div>


    <!-- HERO -->
    <section class="referee-hero">

        <div>

            <span class="referee-hero-badge">
                ⚖️ Control arbitral
            </span>

            <h2>
                Validación de jugadores
            </h2>

            <p>
                Selecciona una jornada para conocer qué jugadores pueden participar.
            </p>

        </div>

        <div class="referee-hero-icon">
            🧑‍⚖️
        </div>

    </section>


    <!-- SELECTOR -->
    <section class="report-filter-card">

        <div class="report-filter-header">

            <div>
                <h3>
                    Seleccione la jornada
                </h3>

                <p>
                    Consulta el estado disciplinario correspondiente a esa fecha.
                </p>
            </div>

        </div>


        <?= $this->Form->create(
            null,
            [
                'type' => 'get',
                'url' => [
                    'controller' => 'Jugadores',
                    'action' => 'reporteArbitro'
                ]
            ]
        ) ?>

        <div class="report-filter-body">

            <div class="report-filter-grid">

                <div class="form-group">

                    <?= $this->Form->control(
                        'jornada_id',
                        [
                            'label' => 'Jornada',
                            'options' => $jornadas,
                            'empty' => 'Seleccione una jornada',
                            'value' => $this->request->getQuery('jornada_id')
                        ]
                    ) ?>

                </div>

                <div class="report-filter-action">

                    <?= $this->Form->button(
                        'Consultar jornada',
                        [
                            'class' => 'button'
                        ]
                    ) ?>

                </div>

            </div>

        </div>

        <?= $this->Form->end() ?>

    </section>


    <?php if (!empty($jornadaSeleccionada)): ?>

        <!-- RESUMEN JORNADA -->
        <section class="referee-summary-card">

            <div class="referee-summary-icon">
                📅
            </div>

            <div>

                <span>
                    Jornada seleccionada
                </span>

                <h3>
                    <?= h($jornadaSeleccionada->nombre) ?>
                </h3>

                <?php if (!empty($jornadaSeleccionada->fecha)): ?>

                    <p>
                        Fecha:
                        <strong>
                            <?= h(
                                $jornadaSeleccionada
                                    ->fecha
                                    ->format('d/m/Y')
                            ) ?>
                        </strong>
                    </p>

                <?php endif; ?>

            </div>

        </section>


        <!-- EQUIPOS -->
        <?php if (!empty($equiposReporte)): ?>

            <div class="referee-teams-list">

                <?php foreach ($equiposReporte as $equipoNombre => $jugadores): ?>

                    <section class="referee-team-card">

                        <div class="referee-team-header">

                            <div class="referee-team-title">

                                <div class="referee-team-icon">
                                    🛡️
                                </div>

                                <div>

                                    <span>
                                        Equipo
                                    </span>

                                    <h3>
                                        <?= h($equipoNombre) ?>
                                    </h3>

                                </div>

                            </div>

                            <div class="referee-team-count">
                                <?= count($jugadores) ?>
                                <?= count($jugadores) === 1
                                    ? 'jugador'
                                    : 'jugadores'
                                ?>
                            </div>

                        </div>


                        <!-- DESKTOP -->
                        <div class="referee-desktop-table">

                            <table class="referee-table">

                                <thead>
                                    <tr>
                                        <th>Jugador</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($jugadores as $jugador): ?>

                                        <tr>

                                            <!-- JUGADOR -->
                                            <td>

                                                <div class="referee-player">

                                                    <div class="referee-player-photo">

                                                        <?php if (!empty($jugador->fotografia)): ?>

                                                            <?= $this->Html->image(
                                                                'jugadores/' .
                                                                $jugador->fotografia,
                                                                [
                                                                    'alt' =>
                                                                        'Fotografía de ' .
                                                                        $jugador->nombres
                                                                ]
                                                            ) ?>

                                                        <?php else: ?>

                                                            👤

                                                        <?php endif; ?>

                                                    </div>


                                                    <div>

                                                        <strong>
                                                            <?= h(
                                                                $jugador->nombres .
                                                                ' ' .
                                                                $jugador->apellidos
                                                            ) ?>
                                                        </strong>

                                                        <span>
                                                            Jugador #<?= $jugador->id ?>
                                                        </span>

                                                    </div>

                                                </div>

                                            </td>


                                            <!-- NACIMIENTO -->
                                            <td>

                                                <?php if (!empty($jugador->fecha_nacimiento)): ?>

                                                    <?= h(
                                                        $jugador
                                                            ->fecha_nacimiento
                                                            ->format('d/m/Y')
                                                    ) ?>

                                                <?php else: ?>

                                                    Sin fecha

                                                <?php endif; ?>

                                            </td>


                                            <!-- ESTADO -->
                                            <td>

                                                <?php
$estaSuspendido =
    !empty($suspendidos[(int)$jugador->id]);
?>

<?php if ($estaSuspendido): ?>

    <span class="referee-status referee-status-suspended">
        ⛔ Suspendido
    </span>

<?php else: ?>

    <span class="referee-status referee-status-enabled">
        ✓ Habilitado
    </span>

<?php endif; ?>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                        </div>


                        <!-- MOBILE -->
                        <div class="referee-mobile-list">

                            <?php foreach ($jugadores as $jugador): ?>

                                <article class="referee-mobile-player">

                                    <div class="referee-mobile-player-top">

                                        <div class="referee-mobile-photo">

                                            <?php if (!empty($jugador->fotografia)): ?>

                                                <?= $this->Html->image(
                                                    'jugadores/' .
                                                    $jugador->fotografia,
                                                    [
                                                        'alt' =>
                                                            'Fotografía de ' .
                                                            $jugador->nombres
                                                    ]
                                                ) ?>

                                            <?php else: ?>

                                                👤

                                            <?php endif; ?>

                                        </div>


                                        <div class="referee-mobile-name">

                                            <span>
                                                Jugador #<?= $jugador->id ?>
                                            </span>

                                            <h3>
                                                <?= h(
                                                    $jugador->nombres .
                                                    ' ' .
                                                    $jugador->apellidos
                                                ) ?>
                                            </h3>

                                            <?php if (!empty($jugador->suspendido)): ?>

                                                <span class="referee-status referee-status-suspended">
                                                    ⛔ Suspendido
                                                </span>

                                            <?php else: ?>

                                                <span class="referee-status referee-status-enabled">
                                                    ✓ Habilitado
                                                </span>

                                            <?php endif; ?>

                                        </div>

                                    </div>


                                    <div class="referee-mobile-info">

                                        <span>
                                            Fecha de nacimiento
                                        </span>

                                        <strong>

                                            <?php if (!empty($jugador->fecha_nacimiento)): ?>

                                                <?= h(
                                                    $jugador
                                                        ->fecha_nacimiento
                                                        ->format('d/m/Y')
                                                ) ?>

                                            <?php else: ?>

                                                Sin fecha

                                            <?php endif; ?>

                                        </strong>

                                    </div>

                                </article>

                            <?php endforeach; ?>

                        </div>

                    </section>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="profile-empty-state">

                <div>
                    🧑‍⚖️
                </div>

                <strong>
                    Sin jugadores para esta jornada
                </strong>

                <span>
                    No se encontraron participantes para mostrar.
                </span>

            </div>

        <?php endif; ?>

    <?php endif; ?>

</div>