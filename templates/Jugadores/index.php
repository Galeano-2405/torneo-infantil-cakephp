<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jugadore> $jugadores
 */
?>

<div class="players-page">

    <!-- CABECERA -->
    <div class="players-header">

        <div>
            <div class="players-kicker">
                Gestión de plantilla
            </div>

            <h1>
                Jugadores
            </h1>

            <p>
                Administra los jugadores registrados, sus equipos
                y fotografías.
            </p>
        </div>

        <div class="players-header-actions">

            <?= $this->Html->link(
                '＋ Nuevo jugador',
                [
                    'controller' => 'Jugadores',
                    'action' => 'add'
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- RESUMEN -->
    <div class="players-summary">

        <div class="players-summary-card">

            <div class="players-summary-icon">
                👥
            </div>

            <div>
                <strong>
                    <?= count($jugadores) ?>
                </strong>

                <span>
                    Jugadores mostrados
                </span>
            </div>

        </div>

    </div>


    <!-- DESKTOP / TABLET -->
    <div class="players-table-card">

        <div class="players-table-top">

            <div>
                <h3>
                    Lista de jugadores
                </h3>

                <p>
                    Información general de los participantes.
                </p>
            </div>

        </div>


        <div class="table-responsive players-desktop-table">

            <table class="players-table">

                <thead>
                    <tr>
                        <th>Jugador</th>
                        <th>Fecha nacimiento</th>
                        <th>Equipo</th>
                        <th>Registro</th>
                        <th class="players-actions-column">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($jugadores as $jugadore): ?>

                        <tr>

                            <!-- JUGADOR -->
                            <td>

                                <div class="player-cell">

                                    <div class="player-avatar">

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

                                            <span>
                                                👤
                                            </span>

                                        <?php endif; ?>

                                    </div>


                                    <div class="player-cell-info">

                                        <strong>
                                            <?= h(
                                                $jugadore->nombres .
                                                ' ' .
                                                $jugadore->apellidos
                                            ) ?>
                                        </strong>

                                        <span>
                                            ID #<?= $jugadore->id ?>
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- NACIMIENTO -->
                            <td>

                                <?php if (!empty($jugadore->fecha_nacimiento)): ?>

                                    <?= h(
                                        $jugadore
                                            ->fecha_nacimiento
                                            ->format('d/m/Y')
                                    ) ?>

                                <?php else: ?>

                                    <span class="muted-value">
                                        Sin fecha
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- EQUIPO -->
                            <td>

                                <?php if ($jugadore->hasValue('equipo')): ?>

                                    <span class="team-badge">
                                        🛡️
                                        <?= h($jugadore->equipo->nombre) ?>
                                    </span>

                                <?php else: ?>

                                    <span class="muted-value">
                                        Sin equipo
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- CREATED -->
                            <td>

                                <?php if (!empty($jugadore->created)): ?>

                                    <?= h(
                                        $jugadore
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
                                        'Ver',
                                        [
                                            'action' => 'view',
                                            $jugadore->id
                                        ],
                                        [
                                            'class' =>
                                                'crud-btn crud-btn-view'
                                        ]
                                    ) ?>


                                    <?= $this->Html->link(
                                        'Editar',
                                        [
                                            'action' => 'edit',
                                            $jugadore->id
                                        ],
                                        [
                                            'class' =>
                                                'crud-btn crud-btn-edit'
                                        ]
                                    ) ?>


                                    <?= $this->Form->postLink(
                                        'Eliminar',
                                        [
                                            'action' => 'delete',
                                            $jugadore->id
                                        ],
                                        [
                                            'confirm' =>
                                                '¿Está seguro de eliminar a ' .
                                                $jugadore->nombres .
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
        <div class="players-mobile-list">

            <?php foreach ($jugadores as $jugadore): ?>

                <article class="player-mobile-card">

                    <div class="player-mobile-top">

                        <div class="player-mobile-avatar">

                            <?php if (!empty($jugadore->fotografia)): ?>

                                <?= $this->Html->image(
                                    'jugadores/' .
                                    $jugadore->fotografia,
                                    [
                                        'alt' =>
                                            'Fotografía de ' .
                                            $jugadore->nombres
                                    ]
                                ) ?>

                            <?php else: ?>

                                <span>
                                    👤
                                </span>

                            <?php endif; ?>

                        </div>


                        <div class="player-mobile-name">

                            <span class="player-id">
                                Jugador #<?= $jugadore->id ?>
                            </span>

                            <h3>
                                <?= h(
                                    $jugadore->nombres .
                                    ' ' .
                                    $jugadore->apellidos
                                ) ?>
                            </h3>


                            <?php if ($jugadore->hasValue('equipo')): ?>

                                <span class="team-badge">
                                    🛡️
                                    <?= h($jugadore->equipo->nombre) ?>
                                </span>

                            <?php endif; ?>

                        </div>

                    </div>


                    <div class="player-mobile-info">

                        <div>
                            <span>
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


                        <div>
                            <span>
                                Equipo
                            </span>

                            <strong>
                                <?= $jugadore->hasValue('equipo')
                                    ? h($jugadore->equipo->nombre)
                                    : 'Sin equipo'
                                ?>
                            </strong>
                        </div>

                    </div>


                    <div class="player-mobile-actions">

                        <?= $this->Html->link(
                            '👁 Ver',
                            [
                                'action' => 'view',
                                $jugadore->id
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
                                $jugadore->id
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
                                $jugadore->id
                            ],
                            [
                                'confirm' =>
                                    '¿Está seguro de eliminar a ' .
                                    $jugadore->nombres .
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
        <div class="players-pagination">

            <ul class="pagination">

                <?= $this->Paginator->first('«') ?>

                <?= $this->Paginator->prev('‹') ?>

                <?= $this->Paginator->numbers() ?>

                <?= $this->Paginator->next('›') ?>

                <?= $this->Paginator->last('»') ?>

            </ul>


            <p>
                <?= $this->Paginator->counter(
                    'Página {{page}} de {{pages}} · {{current}} de {{count}} jugadores'
                ) ?>
            </p>

        </div>

    </div>

</div>