<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Incidencia> $incidencias
 */
?>

<div class="incidents-page">

    <!-- HEADER -->
    <div class="incidents-header">

        <div>
            <div class="incidents-kicker">
                Control disciplinario
            </div>

            <h1>
                Incidencias
            </h1>

            <p>
                Administra tarjetas, faltas y suspensiones de los jugadores.
            </p>
        </div>

        <div class="incidents-header-actions">

            <?= $this->Html->link(
                '＋ Nueva incidencia',
                [
                    'controller' => 'Incidencias',
                    'action' => 'add'
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- RESUMEN -->
    <div class="incidents-summary">

        <div class="incidents-summary-card">

            <div class="incidents-summary-icon">
                📋
            </div>

            <div>
                <strong>
                    <?= count($incidencias) ?>
                </strong>

                <span>
                    Incidencias mostradas
                </span>
            </div>

        </div>

    </div>


    <!-- TABLA -->
    <div class="incidents-table-card">

        <div class="incidents-table-top">

            <div>
                <h3>
                    Historial disciplinario
                </h3>

                <p>
                    Registro general de tarjetas y suspensiones.
                </p>
            </div>

        </div>


        <div class="table-responsive incidents-desktop-table">

            <table class="incidents-table">

                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Descripción</th>
                        <th>Tarjeta</th>
                        <th>Fecha incidencia</th>
                        <th>Suspensión</th>
                        <th class="incidents-actions-column">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($incidencias as $incidencia): ?>

                        <tr>

                            <!-- JUGADOR -->
                            <td>

                                <div class="incident-player-cell">

                                    <div class="incident-player-avatar">

                                        <?php if (
                                            !empty(
                                                $incidencia
                                                    ->jugador
                                                    ->fotografia
                                            )
                                        ): ?>

                                            <?= $this->Html->image(
                                                'jugadores/' .
                                                $incidencia
                                                    ->jugador
                                                    ->fotografia,
                                                [
                                                    'alt' =>
                                                        'Fotografía de ' .
                                                        $incidencia
                                                            ->jugador
                                                            ->nombres
                                                ]
                                            ) ?>

                                        <?php else: ?>

                                            <span>
                                                👤
                                            </span>

                                        <?php endif; ?>

                                    </div>


                                    <div class="incident-player-info">

                                        <strong>
                                            <?= h(
                                                $incidencia
                                                    ->jugador
                                                    ->nombres .
                                                ' ' .
                                                $incidencia
                                                    ->jugador
                                                    ->apellidos
                                            ) ?>
                                        </strong>

                                        <span>
                                            Jugador #<?= $incidencia->jugador_id ?>
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- DESCRIPCIÓN -->
                            <td>
                                <?= h($incidencia->descripcion) ?>
                            </td>


                            <!-- TARJETA -->
                            <td>

                                <?php if ($incidencia->tipo_tarjeta === 'Roja'): ?>

                                    <span class="card-badge card-red">
                                        🟥 Roja
                                    </span>

                                <?php else: ?>

                                    <span class="card-badge card-yellow">
                                        🟨 Amarilla
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- FECHA INCIDENCIA -->
                            <td>

                                <?php if (!empty($incidencia->fecha_incidencia)): ?>

                                    <?= h(
                                        $incidencia
                                            ->fecha_incidencia
                                            ->format('d/m/Y')
                                    ) ?>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>


                            <!-- SUSPENSIÓN -->
                            <td>

                                <?php if (!empty($incidencia->fecha_suspension)): ?>

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


                            <!-- ACCIONES -->
                            <td>

                                <div class="crud-actions">

                                    <?= $this->Html->link(
                                        '👁 Ver',
                                        [
                                            'action' => 'view',
                                            $incidencia->id
                                        ],
                                        [
                                            'class' =>
                                                'crud-btn crud-btn-view'
                                        ]
                                    ) ?>


                                    <?= $this->Html->link(
                                        '✏️ Editar',
                                        [
                                            'action' => 'edit',
                                            $incidencia->id
                                        ],
                                        [
                                            'class' =>
                                                'crud-btn crud-btn-edit'
                                        ]
                                    ) ?>


                                    <?= $this->Form->postLink(
                                        '🗑 Eliminar',
                                        [
                                            'action' => 'delete',
                                            $incidencia->id
                                        ],
                                        [
                                            'confirm' =>
                                                '¿Está seguro de eliminar esta incidencia?',

                                            'class' =>
                                                'crud-btn crud-btn-delete'
                                        ]
                                    ) ?>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <!-- MOBILE -->
        <div class="incidents-mobile-list">

            <?php foreach ($incidencias as $incidencia): ?>

                <article class="incident-mobile-card">

                    <div class="incident-mobile-top">

                        <div class="incident-mobile-avatar">

                            <?php if (
                                !empty(
                                    $incidencia
                                        ->jugador
                                        ->fotografia
                                )
                            ): ?>

                                <?= $this->Html->image(
                                    'jugadores/' .
                                    $incidencia
                                        ->jugador
                                        ->fotografia,
                                    [
                                        'alt' =>
                                            'Fotografía de ' .
                                            $incidencia
                                                ->jugador
                                                ->nombres
                                    ]
                                ) ?>

                            <?php else: ?>

                                <span>
                                    👤
                                </span>

                            <?php endif; ?>

                        </div>


                        <div class="incident-mobile-name">

                            <span class="incident-id">
                                Incidencia #<?= $incidencia->id ?>
                            </span>

                            <h3>
                                <?= h(
                                    $incidencia
                                        ->jugador
                                        ->nombres .
                                    ' ' .
                                    $incidencia
                                        ->jugador
                                        ->apellidos
                                ) ?>
                            </h3>


                            <?php if ($incidencia->tipo_tarjeta === 'Roja'): ?>

                                <span class="card-badge card-red">
                                    🟥 Roja
                                </span>

                            <?php else: ?>

                                <span class="card-badge card-yellow">
                                    🟨 Amarilla
                                </span>

                            <?php endif; ?>

                        </div>

                    </div>


                    <div class="incident-mobile-description">

                        <span>
                            Descripción
                        </span>

                        <strong>
                            <?= h($incidencia->descripcion) ?>
                        </strong>

                    </div>


                    <div class="incident-mobile-info">

                        <div>
                            <span>
                                Fecha incidencia
                            </span>

                            <strong>
                                <?= !empty($incidencia->fecha_incidencia)
                                    ? h(
                                        $incidencia
                                            ->fecha_incidencia
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>


                        <div>
                            <span>
                                Suspensión
                            </span>

                            <strong>

                                <?php if (!empty($incidencia->fecha_suspension)): ?>

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


                    <div class="incident-mobile-actions">

                        <?= $this->Html->link(
                            '👁 Ver',
                            [
                                'action' => 'view',
                                $incidencia->id
                            ],
                            [
                                'class' =>
                                    'mobile-action mobile-view'
                            ]
                        ) ?>


                        <?= $this->Html->link(
                            '✏️ Editar',
                            [
                                'action' => 'edit',
                                $incidencia->id
                            ],
                            [
                                'class' =>
                                    'mobile-action mobile-edit'
                            ]
                        ) ?>


                        <?= $this->Form->postLink(
                            '🗑 Eliminar',
                            [
                                'action' => 'delete',
                                $incidencia->id
                            ],
                            [
                                'confirm' =>
                                    '¿Está seguro de eliminar esta incidencia?',

                                'class' =>
                                    'mobile-action mobile-delete'
                            ]
                        ) ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>


        <!-- PAGINACIÓN -->
        <div class="incidents-pagination">

            <ul class="pagination">

                <?= $this->Paginator->first('«') ?>

                <?= $this->Paginator->prev('‹') ?>

                <?= $this->Paginator->numbers() ?>

                <?= $this->Paginator->next('›') ?>

                <?= $this->Paginator->last('»') ?>

            </ul>


            <p>
                <?= $this->Paginator->counter(
                    'Página {{page}} de {{pages}} · {{current}} de {{count}} incidencias'
                ) ?>
            </p>

        </div>

    </div>

</div>