<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $equipos
 * @var \Cake\Collection\CollectionInterface|string[] $jugadores
 * @var int|string|null $equipoId
 * @var int|string|null $jugadorId
 * @var iterable $incidenciasReporte
 */
?>

<div class="incidencias index content">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    ">

        <div>
            <h3 style="margin-bottom:5px;">
                Reporte de Incidencias
            </h3>

            <p>
                Consulte incidencias por equipo y jugador.
            </p>
        </div>

        <?= $this->Html->link(
            'Volver a Incidencias',
            ['action' => 'index'],
            ['class' => 'button']
        ) ?>

    </div>


    <!-- Filtros -->

    <div style="
        background:#f7f7f7;
        padding:20px;
        border-radius:8px;
        margin-bottom:30px;
    ">

        <?= $this->Form->create(
            null,
            [
                'type' => 'get'
            ]
        ) ?>

        <?= $this->Form->control(
            'equipo_id',
            [
                'label' => 'Equipo',
                'options' => $equipos,
                'empty' => 'Todos los equipos',
                'value' => $equipoId
            ]
        ) ?>

        <?= $this->Form->control(
            'jugador_id',
            [
                'label' => 'Jugador',
                'options' => $jugadores,
                'empty' => 'Todos los jugadores',
                'value' => $jugadorId
            ]
        ) ?>

        <?= $this->Form->button(
            'Consultar'
        ) ?>

        <?= $this->Html->link(
            'Limpiar filtros',
            ['action' => 'reporte'],
            [
                'class' => 'button button-outline',
                'style' => 'margin-left:10px;'
            ]
        ) ?>

        <?= $this->Form->end() ?>

    </div>


    <!-- Resultados -->

    <div class="table-responsive">

        <table>

            <thead>

                <tr>

                    <th>
                        Fotografía
                    </th>

                    <th>
                        Jugador
                    </th>

                    <th>
                        Equipo
                    </th>

                    <th>
                        Descripción
                    </th>

                    <th>
                        Tarjeta
                    </th>

                    <th>
                        Fecha incidencia
                    </th>

                    <th>
                        Fecha suspensión
                    </th>

                </tr>

            </thead>


            <tbody>

                <?php if (!empty($incidenciasReporte)): ?>

                    <?php foreach ($incidenciasReporte as $incidencia): ?>

                        <tr>

                            <!-- Fotografía -->
                            <td>

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
                                            'style' => '
                                                width:65px;
                                                height:65px;
                                                object-fit:cover;
                                                border-radius:8px;
                                            '
                                        ]
                                    ) ?>

                                <?php else: ?>

                                    Sin fotografía

                                <?php endif; ?>

                            </td>


                            <!-- Jugador -->
                            <td>

                                <?= h(
                                    $incidencia
                                        ->jugador
                                        ->nombres .
                                    ' ' .
                                    $incidencia
                                        ->jugador
                                        ->apellidos
                                ) ?>

                            </td>


                            <!-- Equipo -->
                            <td>

                                <?= h(
                                    $incidencia
                                        ->jugador
                                        ->equipo
                                        ->nombre
                                    ?? 'Sin equipo'
                                ) ?>

                            </td>


                            <!-- Descripción -->
                            <td>

                                <?= h(
                                    $incidencia->descripcion
                                ) ?>

                            </td>


                            <!-- Tipo de tarjeta -->
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


                            <!-- Fecha incidencia -->
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


                            <!-- Fecha suspensión -->
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

                <?php else: ?>

                    <tr>

                        <td
                            colspan="7"
                            style="
                                text-align:center;
                                padding:30px;
                            "
                        >

                            No se encontraron incidencias con los filtros seleccionados.

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>