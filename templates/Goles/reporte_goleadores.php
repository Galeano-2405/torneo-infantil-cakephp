<?php
/**
 * @var \App\View\AppView $this
 * @var iterable $goleadores
 */
?>

<div class="scorers-page">

    <!-- HEADER -->
    <div class="report-page-header">

        <div>

            <div class="report-kicker">
                Estadísticas del torneo
            </div>

            <h1>
                Reporte de Goleadores
            </h1>

            <p>
                Ranking general de jugadores según la cantidad de goles anotados.
            </p>

        </div>

        <div class="report-header-actions">

            <?= $this->Html->link(
                '← Volver a goles',
                [
                    'controller' => 'Goles',
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>

        </div>

    </div>


    <!-- HERO -->
    <section class="scorers-hero">

        <div>

            <span class="scorers-hero-badge">
                🏆 Clasificación
            </span>

            <h2>
                Máximos goleadores
            </h2>

            <p>
                Consulta el rendimiento ofensivo de los jugadores participantes.
            </p>

        </div>

        <div class="scorers-hero-ball">
            ⚽
        </div>

    </section>


    <!-- RANKING -->
    <section class="report-card">

        <div class="report-card-header">

            <div>

                <h3>
                    Tabla de goleadores
                </h3>

                <p>
                    Ordenada de mayor a menor cantidad de goles.
                </p>

            </div>

        </div>


        <?php if (!empty($goleadores)): ?>

            <!-- =====================================================
                 DESKTOP
                 ===================================================== -->

            <div class="scorers-desktop">

                <table class="scorers-table">

                    <thead>

                        <tr>
                            <th>Posición</th>
                            <th>Jugador</th>
                            <th>Equipo</th>
                            <th>Total de goles</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $posicion = 1; ?>

                        <?php foreach ($goleadores as $goleador): ?>

                            <tr>

                                <!-- POSICIÓN -->
                                <td>

                                    <div class="
                                        scorer-position
                                        <?= $posicion === 1 ? 'position-first' : '' ?>
                                        <?= $posicion === 2 ? 'position-second' : '' ?>
                                        <?= $posicion === 3 ? 'position-third' : '' ?>
                                    ">

                                        <?php if ($posicion === 1): ?>

                                            🥇

                                        <?php elseif ($posicion === 2): ?>

                                            🥈

                                        <?php elseif ($posicion === 3): ?>

                                            🥉

                                        <?php else: ?>

                                            <?= $posicion ?>

                                        <?php endif; ?>

                                    </div>

                                </td>


                                <!-- JUGADOR -->
                                <td>

                                    <div class="scorer-player">

                                        <div class="scorer-avatar">

                                            <?php if (!empty($goleador->fotografia)): ?>

                                                <?= $this->Html->image(
                                                    'jugadores/' .
                                                    $goleador->fotografia,
                                                    [
                                                        'alt' =>
                                                            'Fotografía de ' .
                                                            $goleador->nombres
                                                    ]
                                                ) ?>

                                            <?php else: ?>

                                                👤

                                            <?php endif; ?>

                                        </div>


                                        <div>

                                            <strong>
                                                <?= h(
                                                    $goleador->nombres .
                                                    ' ' .
                                                    $goleador->apellidos
                                                ) ?>
                                            </strong>

                                            <span>
                                                Jugador #<?= h($goleador->jugador_id) ?>
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <!-- EQUIPO -->
                                <td>

                                    <?php if (!empty($goleador->equipo)): ?>

                                        <span class="team-badge">

                                            🛡️

                                            <?= h($goleador->equipo) ?>

                                        </span>

                                    <?php else: ?>

                                        <span class="muted-value">
                                            Sin equipo
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- GOLES -->
                                <td>

                                    <span class="scorer-goals">

                                        ⚽

                                        <?= h($goleador->total_goles) ?>

                                        <?= (int)$goleador->total_goles === 1
                                            ? 'gol'
                                            : 'goles'
                                        ?>

                                    </span>

                                </td>

                            </tr>

                            <?php $posicion++; ?>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- =====================================================
                 MOBILE
                 ===================================================== -->

            <div class="scorers-mobile">

                <?php $posicion = 1; ?>

                <?php foreach ($goleadores as $goleador): ?>

                    <article class="scorer-mobile-card">

                        <div class="scorer-mobile-rank">

                            <?php if ($posicion === 1): ?>

                                🥇

                            <?php elseif ($posicion === 2): ?>

                                🥈

                            <?php elseif ($posicion === 3): ?>

                                🥉

                            <?php else: ?>

                                #<?= $posicion ?>

                            <?php endif; ?>

                        </div>


                        <div class="scorer-mobile-main">

                            <div class="scorer-mobile-avatar">

                                <?php if (!empty($goleador->fotografia)): ?>

                                    <?= $this->Html->image(
                                        'jugadores/' .
                                        $goleador->fotografia,
                                        [
                                            'alt' =>
                                                'Fotografía de ' .
                                                $goleador->nombres
                                        ]
                                    ) ?>

                                <?php else: ?>

                                    👤

                                <?php endif; ?>

                            </div>


                            <div class="scorer-mobile-name">

                                <span>
                                    Posición <?= $posicion ?>
                                </span>

                                <h3>
                                    <?= h(
                                        $goleador->nombres .
                                        ' ' .
                                        $goleador->apellidos
                                    ) ?>
                                </h3>


                                <?php if (!empty($goleador->equipo)): ?>

                                    <span class="team-badge">

                                        🛡️

                                        <?= h($goleador->equipo) ?>

                                    </span>

                                <?php else: ?>

                                    <span class="muted-value">
                                        Sin equipo
                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>


                        <div class="scorer-mobile-total">

                            <span>
                                Total de goles
                            </span>

                            <strong>
                                ⚽ <?= h($goleador->total_goles) ?>
                            </strong>

                        </div>

                    </article>

                    <?php $posicion++; ?>

                <?php endforeach; ?>

            </div>


        <?php else: ?>

            <div class="profile-empty-state">

                <div>
                    🏆
                </div>

                <strong>
                    Sin goleadores
                </strong>

                <span>
                    Todavía no existen goles registrados.
                </span>

            </div>

        <?php endif; ?>

    </section>

</div>