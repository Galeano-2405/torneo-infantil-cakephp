<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Equipo> $equipos
 */
?>

<div class="teams-page">

    <!-- HEADER -->
    <div class="teams-header">

        <div>
            <div class="teams-kicker">
                Catálogo del torneo
            </div>

            <h1>
                Equipos
            </h1>

            <p>
                Administra los equipos participantes del torneo.
            </p>
        </div>

        <div class="teams-header-actions">

            <?= $this->Html->link(
                '＋ Nuevo equipo',
                [
                    'controller' => 'Equipos',
                    'action' => 'add'
                ],
                [
                    'class' => 'button'
                ]
            ) ?>

        </div>

    </div>


    <!-- RESUMEN -->
    <div class="teams-summary">

        <div class="teams-summary-card">

            <div class="teams-summary-icon">
                🛡️
            </div>

            <div>
                <strong>
                    <?= count($equipos) ?>
                </strong>

                <span>
                    Equipos mostrados
                </span>
            </div>

        </div>

    </div>


    <!-- TABLA -->
    <div class="teams-table-card">

        <div class="teams-table-top">

            <div>
                <h3>
                    Lista de equipos
                </h3>

                <p>
                    Información general de los equipos registrados.
                </p>
            </div>

        </div>


        <div class="table-responsive teams-desktop-table">

            <table class="teams-table">

                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>Registro</th>
                        <th>Actualización</th>
                        <th class="teams-actions-column">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($equipos as $equipo): ?>

                        <tr>

                            <!-- EQUIPO -->
                            <td>

                                <div class="team-main-cell">

                                    <div class="team-main-icon">
                                        🛡️
                                    </div>

                                    <div class="team-main-info">

                                        <strong>
                                            <?= h($equipo->nombre) ?>
                                        </strong>

                                        <span>
                                            Equipo #<?= $equipo->id ?>
                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- REGISTRO -->
                            <td>

                                <?php if (!empty($equipo->created)): ?>

                                    <?= h(
                                        $equipo
                                            ->created
                                            ->format('d/m/Y')
                                    ) ?>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>


                            <!-- MODIFICADO -->
                            <td>

                                <?php if (!empty($equipo->modified)): ?>

                                    <?= h(
                                        $equipo
                                            ->modified
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
                                            $equipo->id
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
                                            $equipo->id
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
                                            $equipo->id
                                        ],
                                        [
                                            'confirm' =>
                                                '¿Está seguro de eliminar el equipo ' .
                                                $equipo->nombre .
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
        <div class="teams-mobile-list">

            <?php foreach ($equipos as $equipo): ?>

                <article class="team-mobile-card">

                    <div class="team-mobile-top">

                        <div class="team-mobile-icon">
                            🛡️
                        </div>

                        <div class="team-mobile-name">

                            <span class="team-id">
                                Equipo #<?= $equipo->id ?>
                            </span>

                            <h3>
                                <?= h($equipo->nombre) ?>
                            </h3>

                        </div>

                    </div>


                    <div class="team-mobile-info">

                        <div>
                            <span>
                                Fecha de registro
                            </span>

                            <strong>
                                <?= !empty($equipo->created)
                                    ? h(
                                        $equipo
                                            ->created
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>


                        <div>
                            <span>
                                Última actualización
                            </span>

                            <strong>
                                <?= !empty($equipo->modified)
                                    ? h(
                                        $equipo
                                            ->modified
                                            ->format('d/m/Y')
                                    )
                                    : 'Sin fecha'
                                ?>
                            </strong>
                        </div>

                    </div>


                    <div class="team-mobile-actions">

                        <?= $this->Html->link(
                            '👁 Ver',
                            [
                                'action' => 'view',
                                $equipo->id
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
                                $equipo->id
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
                                $equipo->id
                            ],
                            [
                                'confirm' =>
                                    '¿Está seguro de eliminar el equipo ' .
                                    $equipo->nombre .
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
        <div class="teams-pagination">

            <ul class="pagination">

                <?= $this->Paginator->first('«') ?>

                <?= $this->Paginator->prev('‹') ?>

                <?= $this->Paginator->numbers() ?>

                <?= $this->Paginator->next('›') ?>

                <?= $this->Paginator->last('»') ?>

            </ul>


            <p>
                <?= $this->Paginator->counter(
                    'Página {{page}} de {{pages}} · {{current}} de {{count}} equipos'
                ) ?>
            </p>

        </div>

    </div>

</div>