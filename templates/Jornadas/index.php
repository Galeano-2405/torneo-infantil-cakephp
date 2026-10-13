<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jornada> $jornadas
 */
?>

<div class="journeys-page">

    <!-- HEADER -->
    <div class="journeys-header">

        <div>
            <div class="journeys-kicker">
                Planificación del torneo
            </div>

            <h1>
                Jornadas
            </h1>

            <p>
                Administra las jornadas y fechas programadas del torneo.
            </p>
        </div>

        <div class="journeys-header-actions">

            <?= $this->Html->link(
                '＋ Nueva jornada',
                [
                    'controller' => 'Jornadas',
                    'action' => 'add'
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- RESUMEN -->
    <div class="journeys-summary">

        <div class="journeys-summary-card">

            <div class="journeys-summary-icon">
                📅
            </div>

            <div>
                <strong>
                    <?= count($jornadas) ?>
                </strong>

                <span>
                    Jornadas mostradas
                </span>
            </div>

        </div>

    </div>


    <!-- TABLA -->
    <div class="journeys-table-card">

        <div class="journeys-table-top">

            <div>
                <h3>
                    Calendario de jornadas
                </h3>

                <p>
                    Consulta y administra las fechas del torneo.
                </p>
            </div>

        </div>


        <div class="table-responsive journeys-desktop-table">

            <table class="journeys-table">

                <thead>
                    <tr>
                        <th>Jornada</th>
                        <th>Fecha</th>
                        <th>Registro</th>
                        <th class="journeys-actions-column">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($jornadas as $jornada): ?>

                        <tr>

                            <!-- JORNADA -->
                            <td>

                                <div class="journey-main-cell">

                                    <div class="journey-main-icon">
                                        📅
                                    </div>

                                    <div class="journey-main-info">

                                        <strong>
                                            <?= h($jornada->nombre) ?>
                                        </strong>

                                        <span>
                                            Jornada #<?= $jornada->id ?>
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- FECHA -->
                            <td>

                                <?php if (!empty($jornada->fecha)): ?>

                                    <span class="journey-date-badge">
                                        🗓
                                        <?= h(
                                            $jornada
                                                ->fecha
                                                ->format('d/m/Y')
                                        ) ?>
                                    </span>

                                <?php else: ?>

                                    <span class="muted-value">
                                        Sin fecha
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- REGISTRO -->
                            <td>

                                <?php if (!empty($jornada->created)): ?>

                                    <?= h(
                                        $jornada
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
                                            $jornada->id
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
                                            $jornada->id
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
                                            $jornada->id
                                        ],
                                        [
                                            'confirm' =>
                                                '¿Está seguro de eliminar la jornada ' .
                                                $jornada->nombre .
                                                '?',

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
        <div class="journeys-mobile-list">

            <?php foreach ($jornadas as $jornada): ?>

                <article class="journey-mobile-card">

                    <div class="journey-mobile-top">

                        <div class="journey-mobile-icon">
                            📅
                        </div>

                        <div class="journey-mobile-name">

                            <span class="journey-id">
                                Jornada #<?= $jornada->id ?>
                            </span>

                            <h3>
                                <?= h($jornada->nombre) ?>
                            </h3>

                        </div>

                    </div>


                    <div class="journey-mobile-info">

                        <div>
                            <span>
                                Fecha programada
                            </span>

                            <strong>
                                <?= !empty($jornada->fecha)
                                    ? h(
                                        $jornada
                                            ->fecha
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>


                        <div>
                            <span>
                                Fecha de registro
                            </span>

                            <strong>
                                <?= !empty($jornada->created)
                                    ? h(
                                        $jornada
                                            ->created
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>

                    </div>


                    <div class="journey-mobile-actions">

                        <?= $this->Html->link(
                            '👁 Ver',
                            [
                                'action' => 'view',
                                $jornada->id
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
                                $jornada->id
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
                                $jornada->id
                            ],
                            [
                                'confirm' =>
                                    '¿Está seguro de eliminar la jornada ' .
                                    $jornada->nombre .
                                    '?',

                                'class' =>
                                    'mobile-action mobile-delete'
                            ]
                        ) ?>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>


        <!-- PAGINACIÓN -->
        <div class="journeys-pagination">

            <ul class="pagination">

                <?= $this->Paginator->first('«') ?>

                <?= $this->Paginator->prev('‹') ?>

                <?= $this->Paginator->numbers() ?>

                <?= $this->Paginator->next('›') ?>

                <?= $this->Paginator->last('»') ?>

            </ul>


            <p>
                <?= $this->Paginator->counter(
                    'Página {{page}} de {{pages}} · {{current}} de {{count}} jornadas'
                ) ?>
            </p>

        </div>

    </div>

</div>