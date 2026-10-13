<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Gole> $goles
 */
?>

<div class="goals-page">

    <!-- HEADER -->
    <div class="goals-header">

        <div>
            <div class="goals-kicker">
                Registro de anotaciones
            </div>

            <h1>
                Goles
            </h1>

            <p>
                Administra los goles anotados por jugador y jornada.
            </p>
        </div>

        <div class="goals-header-actions">

            <?= $this->Html->link(
                '＋ Registrar goles',
                [
                    'controller' => 'Goles',
                    'action' => 'add'
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- RESUMEN -->
    <div class="goals-summary">

        <div class="goals-summary-card">

            <div class="goals-summary-icon">
                ⚽
            </div>

            <div>
                <strong>
                    <?= count($goles) ?>
                </strong>

                <span>
                    Registros mostrados
                </span>
            </div>

        </div>

    </div>


    <!-- TABLA -->
    <div class="goals-table-card">

        <div class="goals-table-top">

            <div>
                <h3>
                    Historial de goles
                </h3>

                <p>
                    Registro de anotaciones por jugador y jornada.
                </p>
            </div>

        </div>


        <div class="table-responsive goals-desktop-table">

            <table class="goals-table">

                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Jornada</th>
                        <th>Goles</th>
                        <th>Registro</th>
                        <th class="goals-actions-column">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($goles as $gole): ?>

                        <tr>

                            <!-- JUGADOR -->
                            <td>

                                <div class="goal-player-cell">

                                    <div class="goal-player-avatar">

                                        <?php if (
                                            !empty(
                                                $gole
                                                    ->jugador
                                                    ->fotografia
                                            )
                                        ): ?>

                                            <?= $this->Html->image(
                                                'jugadores/' .
                                                $gole
                                                    ->jugador
                                                    ->fotografia,
                                                [
                                                    'alt' =>
                                                        'Fotografía de ' .
                                                        $gole
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


                                    <div class="goal-player-info">

                                        <strong>
                                            <?= h(
                                                $gole
                                                    ->jugador
                                                    ->nombres .
                                                ' ' .
                                                $gole
                                                    ->jugador
                                                    ->apellidos
                                            ) ?>
                                        </strong>

                                        <span>
                                            Jugador #<?= $gole->jugador_id ?>
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- JORNADA -->
                            <td>

                                <?php if (!empty($gole->jornada)): ?>

                                    <span class="journey-badge">
                                        📅
                                        <?= h($gole->jornada->nombre) ?>
                                    </span>

                                <?php else: ?>

                                    <span class="muted-value">
                                        Sin jornada
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- CANTIDAD -->
                            <td>

                                <span class="goals-badge">

                                    ⚽

                                    <?= (int)$gole->cantidad ?>

                                    <?= (int)$gole->cantidad === 1
                                        ? 'gol'
                                        : 'goles'
                                    ?>

                                </span>

                            </td>


                            <!-- REGISTRO -->
                            <td>

                                <?php if (!empty($gole->created)): ?>

                                    <?= h(
                                        $gole
                                            ->created
                                            ->format('d/m/Y')
                                    ) ?>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>


                            <!-- ACCIONES -->
                            <td>

                                <div class="crud-actions">

                                    <?= $this->Html->link(
                                        '👁 Ver',
                                        [
                                            'action' => 'view',
                                            $gole->id
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
                                            $gole->id
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
                                            $gole->id
                                        ],
                                        [
                                            'confirm' =>
                                                '¿Está seguro de eliminar este registro de goles?',

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
        <div class="goals-mobile-list">

            <?php foreach ($goles as $gole): ?>

                <article class="goal-mobile-card">

                    <div class="goal-mobile-top">

                        <div class="goal-mobile-avatar">

                            <?php if (
                                !empty(
                                    $gole
                                        ->jugador
                                        ->fotografia
                                )
                            ): ?>

                                <?= $this->Html->image(
                                    'jugadores/' .
                                    $gole
                                        ->jugador
                                        ->fotografia,
                                    [
                                        'alt' =>
                                            'Fotografía de ' .
                                            $gole
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


                        <div class="goal-mobile-name">

                            <span class="goal-id">
                                Registro #<?= $gole->id ?>
                            </span>

                            <h3>
                                <?= h(
                                    $gole
                                        ->jugador
                                        ->nombres .
                                    ' ' .
                                    $gole
                                        ->jugador
                                        ->apellidos
                                ) ?>
                            </h3>

                            <span class="goals-badge">

                                ⚽

                                <?= (int)$gole->cantidad ?>

                                <?= (int)$gole->cantidad === 1
                                    ? 'gol'
                                    : 'goles'
                                ?>

                            </span>

                        </div>

                    </div>


                    <div class="goal-mobile-info">

                        <div>
                            <span>
                                Jornada
                            </span>

                            <strong>
                                <?= !empty($gole->jornada)
                                    ? h($gole->jornada->nombre)
                                    : 'Sin jornada'
                                ?>
                            </strong>
                        </div>


                        <div>
                            <span>
                                Fecha de registro
                            </span>

                            <strong>
                                <?= !empty($gole->created)
                                    ? h(
                                        $gole
                                            ->created
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>

                    </div>


                    <div class="goal-mobile-actions">

                        <?= $this->Html->link(
                            '👁 Ver',
                            [
                                'action' => 'view',
                                $gole->id
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
                                $gole->id
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
                                $gole->id
                            ],
                            [
                                'confirm' =>
                                    '¿Está seguro de eliminar este registro de goles?',

                                'class' =>
                                    'mobile-action mobile-delete'
                            ]
                        ) ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>


        <!-- PAGINACIÓN -->
        <div class="goals-pagination">

            <ul class="pagination">

                <?= $this->Paginator->first('«') ?>

                <?= $this->Paginator->prev('‹') ?>

                <?= $this->Paginator->numbers() ?>

                <?= $this->Paginator->next('›') ?>

                <?= $this->Paginator->last('»') ?>

            </ul>


            <p>
                <?= $this->Paginator->counter(
                    'Página {{page}} de {{pages}} · {{current}} de {{count}} registros'
                ) ?>
            </p>

        </div>

    </div>

</div>