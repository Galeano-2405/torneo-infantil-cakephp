<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var int $totalGoles
 */
?>

<div class="row">

    <aside class="column">

        <div class="side-nav">

            <h4 class="heading">
                <?= __('Acciones') ?>
            </h4>

            <?= $this->Html->link(
                __('Editar jugador'),
                [
                    'action' => 'edit',
                    $jugadore->id
                ],
                [
                    'class' => 'side-nav-item'
                ]
            ) ?>

            <?= $this->Form->postLink(
                __('Eliminar jugador'),
                [
                    'action' => 'delete',
                    $jugadore->id
                ],
                [
                    'confirm' =>
                        __('¿Está seguro de eliminar este jugador?'),

                    'class' => 'side-nav-item'
                ]
            ) ?>

            <?= $this->Html->link(
                __('Lista de jugadores'),
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'side-nav-item'
                ]
            ) ?>

            <?= $this->Html->link(
                __('Nuevo jugador'),
                [
                    'action' => 'add'
                ],
                [
                    'class' => 'side-nav-item'
                ]
            ) ?>

        </div>

    </aside>


    <div class="column column-80">

        <div class="jugadores view content">

            <h3>
                <?= h(
                    $jugadore->nombres .
                    ' ' .
                    $jugadore->apellidos
                ) ?>
            </h3>


            <!-- DATOS DEL JUGADOR -->

            <div style="
                display:flex;
                gap:30px;
                margin-bottom:30px;
                align-items:flex-start;
            ">

                <!-- Fotografía -->

                <div>

                    <?php if (!empty($jugadore->fotografia)): ?>

                        <?= $this->Html->image(
                            'jugadores/' .
                            $jugadore->fotografia,
                            [
                                'alt' =>
                                    'Fotografía de ' .
                                    $jugadore->nombres,

                                'style' => '
                                    width:200px;
                                    height:200px;
                                    object-fit:cover;
                                    border-radius:12px;
                                    border:1px solid #ddd;
                                '
                            ]
                        ) ?>

                    <?php else: ?>

                        <div style="
                            width:200px;
                            height:200px;
                            background:#eee;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            border-radius:12px;
                        ">

                            Sin fotografía

                        </div>

                    <?php endif; ?>

                </div>


                <!-- Información -->

                <div style="flex:1;">

                    <table>

                        <tr>

                            <th>
                                Nombres
                            </th>

                            <td>
                                <?= h($jugadore->nombres) ?>
                            </td>

                        </tr>


                        <tr>

                            <th>
                                Apellidos
                            </th>

                            <td>
                                <?= h($jugadore->apellidos) ?>
                            </td>

                        </tr>


                        <tr>

                            <th>
                                Fecha de nacimiento
                            </th>

                            <td>

                                <?php if (!empty($jugadore->fecha_nacimiento)): ?>

                                    <?= h(
                                        $jugadore
                                            ->fecha_nacimiento
                                            ->format('d/m/Y')
                                    ) ?>

                                <?php endif; ?>

                            </td>

                        </tr>


                        <tr>

                            <th>
                                Equipo
                            </th>

                            <td>

                                <?php if ($jugadore->hasValue('equipo')): ?>

                                    <?= $this->Html->link(
                                        $jugadore->equipo->nombre,
                                        [
                                            'controller' => 'Equipos',
                                            'action' => 'view',
                                            $jugadore->equipo->id
                                        ]
                                    ) ?>

                                <?php else: ?>

                                    Sin equipo

                                <?php endif; ?>

                            </td>

                        </tr>


                        <tr>

                            <th>
                                Total de goles
                            </th>

                            <td>

                                <strong>
                                    <?= h($totalGoles) ?>
                                </strong>

                            </td>

                        </tr>

                    </table>

                </div>

            </div>


            <!-- HISTORIAL DE GOLES -->

            <h4>
                Historial de Goles
            </h4>

            <?php if (!empty($jugadore->goles)): ?>

                <div class="table-responsive">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Jornada
                                </th>

                                <th>
                                    Fecha
                                </th>

                                <th>
                                    Goles
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($jugadore->goles as $gol): ?>

                                <tr>

                                    <td>

                                        <?= h(
                                            $gol->jornada->nombre
                                            ?? 'Sin jornada'
                                        ) ?>

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

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <?= h($gol->cantidad) ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <p>
                    El jugador todavía no tiene goles registrados.
                </p>

            <?php endif; ?>


            <!-- INCIDENCIAS -->

            <h4 style="margin-top:30px;">
                Historial de Incidencias
            </h4>

            <?php if (!empty($jugadore->incidencias)): ?>

                <div class="table-responsive">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Descripción
                                </th>

                                <th>
                                    Tarjeta
                                </th>

                                <th>
                                    Fecha
                                </th>

                                <th>
                                    Fecha de suspensión
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach (
                                $jugadore->incidencias
                                as $incidencia
                            ): ?>

                                <tr>

                                    <td>

                                        <?= h(
                                            $incidencia->descripcion
                                        ) ?>

                                    </td>


                                    <td>

                                        <?php if (
                                            $incidencia->tipo_tarjeta === 'Roja'
                                        ): ?>

                                            <span style="
                                                background:#dc3545;
                                                color:white;
                                                padding:6px 10px;
                                                border-radius:5px;
                                                font-weight:bold;
                                            ">

                                                Roja

                                            </span>

                                        <?php else: ?>

                                            <span style="
                                                background:#f4c430;
                                                color:#222;
                                                padding:6px 10px;
                                                border-radius:5px;
                                                font-weight:bold;
                                            ">

                                                Amarilla

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

                                        <?php endif; ?>

                                    </td>


                                    <td>

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

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <p>
                    El jugador no tiene incidencias registradas.
                </p>

            <?php endif; ?>

        </div>

    </div>

</div>