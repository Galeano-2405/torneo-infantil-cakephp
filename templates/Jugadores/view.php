<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var int $totalGoles
 */
?>

<div class="player-profile-page">

    <!-- =====================================================
         HEADER
         ===================================================== -->

    <div class="profile-page-header">

        <div>
            <div class="profile-kicker">
                Perfil del jugador
            </div>

            <h1>
                <?= h(
                    $jugadore->nombres .
                    ' ' .
                    $jugadore->apellidos
                ) ?>
            </h1>

            <p>
                Consulta la información, goles e incidencias del jugador.
            </p>
        </div>


        <div class="profile-header-actions">

            <?= $this->Html->link(
                '← Volver',
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'form-secondary-button'
                ]
            ) ?>

            <?= $this->Html->link(
                '✏️ Editar',
                [
                    'action' => 'edit',
                    $jugadore->id
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- =====================================================
         PERFIL
         ===================================================== -->

    <section class="player-profile-card">

        <div class="player-profile-main">

            <!-- FOTO -->

            <div class="player-profile-photo">

                <?php if (!empty($jugadore->fotografia)): ?>

                    <?= $this->Html->image(
                        'jugadores/' . $jugadore->fotografia,
                        [
                            'alt' =>
                                'Fotografía de ' .
                                $jugadore->nombres
                        ]
                    ) ?>

                <?php else: ?>

                    <div class="player-profile-no-photo">
                        👤
                    </div>

                <?php endif; ?>

            </div>


            <!-- DATOS -->

            <div class="player-profile-content">

                <div class="player-profile-name-mobile">

                    <span>
                        Jugador #<?= $jugadore->id ?>
                    </span>

                    <h2>
                        <?= h(
                            $jugadore->nombres .
                            ' ' .
                            $jugadore->apellidos
                        ) ?>
                    </h2>

                </div>


                <div class="player-details-grid">


                    <!-- NOMBRES -->

                    <div class="profile-detail">

                        <span class="profile-detail-label">
                            Nombres
                        </span>

                        <strong>
                            <?= h($jugadore->nombres) ?>
                        </strong>

                    </div>


                    <!-- APELLIDOS -->

                    <div class="profile-detail">

                        <span class="profile-detail-label">
                            Apellidos
                        </span>

                        <strong>
                            <?= h($jugadore->apellidos) ?>
                        </strong>

                    </div>


                    <!-- NACIMIENTO -->

                    <div class="profile-detail">

                        <span class="profile-detail-label">
                            Fecha de nacimiento
                        </span>

                        <strong>

                            <?php if (!empty($jugadore->fecha_nacimiento)): ?>

                                <?= h(
                                    $jugadore
                                        ->fecha_nacimiento
                                        ->format('d/m/Y')
                                ) ?>

                            <?php else: ?>

                                Sin fecha

                            <?php endif; ?>

                        </strong>

                    </div>


                    <!-- EQUIPO -->

                    <div class="profile-detail">

                        <span class="profile-detail-label">
                            Equipo
                        </span>

                        <strong>

                            <?php if ($jugadore->hasValue('equipo')): ?>

                                <?= $this->Html->link(
                                    $jugadore->equipo->nombre,
                                    [
                                        'controller' => 'Equipos',
                                        'action' => 'view',
                                        $jugadore->equipo->id
                                    ],
                                    [
                                        'class' => 'profile-team-link'
                                    ]
                                ) ?>

                            <?php else: ?>

                                Sin equipo

                            <?php endif; ?>

                        </strong>

                    </div>


                    <!-- GOLES -->

                    <div class="profile-detail profile-detail-goals">

                        <span class="profile-detail-label">
                            Total de goles
                        </span>

                        <strong class="profile-goals-total">
                            ⚽ <?= h($totalGoles) ?>
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         HISTORIAL DE GOLES
         ===================================================== -->

    <section class="profile-section-card">

        <div class="profile-section-header">

            <div>

                <div class="profile-section-icon">
                    ⚽
                </div>

                <div>
                    <h2>
                        Historial de Goles
                    </h2>

                    <p>
                        Anotaciones registradas por jornada.
                    </p>
                </div>

            </div>

        </div>


        <?php if (!empty($jugadore->goles)): ?>


            <!-- DESKTOP -->

            <div class="profile-desktop-table">

                <table class="profile-table">

                    <thead>
                        <tr>
                            <th>Jornada</th>
                            <th>Fecha</th>
                            <th>Goles</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($jugadore->goles as $gol): ?>

                            <tr>

                                <td>

                                    <span class="journey-badge">
                                        📅
                                        <?= h(
                                            $gol->jornada->nombre
                                            ?? 'Sin jornada'
                                        ) ?>
                                    </span>

                                </td>


                                <td>

                                    <?php if (
                                        !empty($gol->jornada->fecha)
                                    ): ?>

                                        <?= h(
                                            $gol
                                                ->jornada
                                                ->fecha
                                                ->format('d/m/Y')
                                        ) ?>

                                    <?php else: ?>

                                        Sin fecha

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <span class="goals-badge">

                                        ⚽ <?= h($gol->cantidad) ?>

                                        <?= (int)$gol->cantidad === 1
                                            ? 'gol'
                                            : 'goles'
                                        ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- MOBILE -->

            <div class="profile-mobile-history">

                <?php foreach ($jugadore->goles as $gol): ?>

                    <article class="history-mobile-card goal-history-card">

                        <div class="history-mobile-top">

                            <div class="history-mobile-icon">
                                ⚽
                            </div>

                            <div>

                                <span>
                                    Jornada
                                </span>

                                <h3>
                                    <?= h(
                                        $gol->jornada->nombre
                                        ?? 'Sin jornada'
                                    ) ?>
                                </h3>

                            </div>

                        </div>


                        <div class="history-mobile-grid">

                            <div>

                                <span>
                                    Fecha
                                </span>

                                <strong>

                                    <?php if (
                                        !empty($gol->jornada->fecha)
                                    ): ?>

                                        <?= h(
                                            $gol
                                                ->jornada
                                                ->fecha
                                                ->format('d/m/Y')
                                        ) ?>

                                    <?php else: ?>

                                        Sin fecha

                                    <?php endif; ?>

                                </strong>

                            </div>


                            <div>

                                <span>
                                    Goles
                                </span>

                                <strong class="mobile-goal-value">

                                    ⚽ <?= h($gol->cantidad) ?>

                                </strong>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


        <?php else: ?>

            <div class="profile-empty-state">

                <div>
                    ⚽
                </div>

                <strong>
                    Sin goles registrados
                </strong>

                <span>
                    El jugador todavía no tiene anotaciones.
                </span>

            </div>

        <?php endif; ?>

    </section>


    <!-- =====================================================
         HISTORIAL DE INCIDENCIAS
         ===================================================== -->

    <section class="profile-section-card">

        <div class="profile-section-header">

            <div>

                <div class="profile-section-icon incident-icon">
                    🟨
                </div>

                <div>
                    <h2>
                        Historial de Incidencias
                    </h2>

                    <p>
                        Tarjetas, faltas y suspensiones registradas.
                    </p>
                </div>

            </div>

        </div>


        <?php if (!empty($jugadore->incidencias)): ?>


            <!-- DESKTOP -->

            <div class="profile-desktop-table">

                <table class="profile-table">

                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Tarjeta</th>
                            <th>Fecha</th>
                            <th>Suspensión</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach (
                            $jugadore->incidencias as $incidencia
                        ): ?>

                            <tr>

                                <td>
                                    <?= h($incidencia->descripcion) ?>
                                </td>


                                <td>

                                    <?php if (
                                        $incidencia->tipo_tarjeta === 'Roja'
                                    ): ?>

                                        <span class="card-badge card-red">
                                            🟥 Roja
                                        </span>

                                    <?php else: ?>

                                        <span class="card-badge card-yellow">
                                            🟨 Amarilla
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <?php if (
                                        !empty(
                                            $incidencia->fecha_incidencia
                                        )
                                    ): ?>

                                        <?= h(
                                            $incidencia
                                                ->fecha_incidencia
                                                ->format('d/m/Y')
                                        ) ?>

                                    <?php else: ?>

                                        Sin fecha

                                    <?php endif; ?>

                                </td>


                                <td>

                                    <?php if (
                                        !empty(
                                            $incidencia->fecha_suspension
                                        )
                                    ): ?>

                                        <span class="suspension-badge">

                                            ⛔

                                            <?= h(
                                                $incidencia
                                                    ->fecha_suspension
                                                    ->format('d/m/Y')
                                            ) ?>

                                        </span>

                                    <?php else: ?>

                                        <span class="no-suspension">
                                            No aplica
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- MOBILE -->

            <div class="profile-mobile-history">

                <?php foreach (
                    $jugadore->incidencias as $incidencia
                ): ?>

                    <article class="history-mobile-card">

                        <div class="incident-history-header">

                            <div>

                                <?php if (
                                    $incidencia->tipo_tarjeta === 'Roja'
                                ): ?>

                                    <span class="card-badge card-red">
                                        🟥 Roja
                                    </span>

                                <?php else: ?>

                                    <span class="card-badge card-yellow">
                                        🟨 Amarilla
                                    </span>

                                <?php endif; ?>

                            </div>

                            <span class="incident-history-id">
                                Incidencia
                            </span>

                        </div>


                        <div class="history-description">

                            <span>
                                Descripción
                            </span>

                            <strong>
                                <?= h($incidencia->descripcion) ?>
                            </strong>

                        </div>


                        <div class="history-mobile-grid">

                            <div>

                                <span>
                                    Fecha
                                </span>

                                <strong>

                                    <?php if (
                                        !empty(
                                            $incidencia->fecha_incidencia
                                        )
                                    ): ?>

                                        <?= h(
                                            $incidencia
                                                ->fecha_incidencia
                                                ->format('d/m/Y')
                                        ) ?>

                                    <?php else: ?>

                                        Sin fecha

                                    <?php endif; ?>

                                </strong>

                            </div>


                            <div>

                                <span>
                                    Suspensión
                                </span>

                                <strong>

                                    <?php if (
                                        !empty(
                                            $incidencia->fecha_suspension
                                        )
                                    ): ?>

                                        <?= h(
                                            $incidencia
                                                ->fecha_suspension
                                                ->format('d/m/Y')
                                        ) ?>

                                    <?php else: ?>

                                        No aplica

                                    <?php endif; ?>

                                </strong>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


        <?php else: ?>

            <div class="profile-empty-state">

                <div>
                    📋
                </div>

                <strong>
                    Sin incidencias
                </strong>

                <span>
                    El jugador no tiene incidencias registradas.
                </span>

            </div>

        <?php endif; ?>

    </section>


    <!-- =====================================================
         ACCIONES FINALES
         ===================================================== -->

    <div class="profile-bottom-actions">

        <?= $this->Html->link(
            '← Lista de jugadores',
            [
                'action' => 'index'
            ],
            [
                'class' => 'form-secondary-button'
            ]
        ) ?>


        <?= $this->Form->postLink(
            '🗑 Eliminar jugador',
            [
                'action' => 'delete',
                $jugadore->id
            ],
            [
                'confirm' =>
                    '¿Está seguro de eliminar este jugador?',
                'class' =>
                    'form-danger-button'
            ]
        ) ?>

    </div>

</div>