<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $jornadas
 * @var int|string|null $jornadaId
 * @var \App\Model\Entity\Jornada|null $jornadaSeleccionada
 * @var array $equiposReporte
 * @var array $suspendidos
 */
?>

<div class="jugadores index content">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
    ">

        <div>
            <h3 style="margin-bottom:5px;">
                Reporte para Árbitro
            </h3>

            <p>
                Lista de equipos y jugadores para la jornada seleccionada.
            </p>
        </div>

        <?= $this->Html->link(
            'Volver a Jugadores',
            ['action' => 'index'],
            ['class' => 'button']
        ) ?>

    </div>


    <!-- Selector de jornada -->
    <div style="
        background:#f7f7f7;
        padding:20px;
        border-radius:8px;
        margin-bottom:30px;
    ">

        <?= $this->Form->create(null, [
            'type' => 'get'
        ]) ?>

        <?= $this->Form->control('jornada_id', [
            'label' => 'Seleccione la jornada',
            'options' => $jornadas,
            'empty' => 'Seleccione una jornada',
            'value' => $jornadaId,
            'required' => true
        ]) ?>

        <?= $this->Form->button(
            'Consultar Jornada'
        ) ?>

        <?= $this->Form->end() ?>

    </div>


    <?php if ($jornadaSeleccionada): ?>

        <div style="
            margin-bottom:25px;
            padding:15px;
            background:#ffffff;
            border:1px solid #ddd;
            border-radius:8px;
        ">

            <h4 style="margin-bottom:5px;">
                <?= h($jornadaSeleccionada->nombre) ?>
            </h4>

            <p style="margin:0;">
                <strong>Fecha:</strong>

                <?= h(
                    $jornadaSeleccionada
                        ->fecha
                        ->format('d/m/Y')
                ) ?>
            </p>

        </div>


        <?php if (!empty($equiposReporte)): ?>

            <?php foreach ($equiposReporte as $equipo => $jugadores): ?>

                <div style="
                    margin-bottom:35px;
                    border:1px solid #ddd;
                    border-radius:8px;
                    overflow:hidden;
                ">

                    <!-- Nombre del equipo -->
                    <div style="
                        padding:15px 20px;
                        background:#f2f2f2;
                    ">

                        <h4 style="margin:0;">
                            Equipo:
                            <?= h($equipo) ?>
                        </h4>

                    </div>


                    <div class="table-responsive">

                        <table style="margin-bottom:0;">

                            <thead>
                                <tr>
                                    <th>Fotografía</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($jugadores as $jugador): ?>

                                    <?php
                                        $estaSuspendido =
                                            isset(
                                                $suspendidos[
                                                    (int)$jugador->id
                                                ]
                                            );
                                    ?>

                                    <tr>

                                        <!-- Fotografía -->
                                        <td>

                                            <?php if (!empty($jugador->fotografia)): ?>

                                                <?= $this->Html->image(
                                                    'jugadores/' .
                                                    $jugador->fotografia,
                                                    [
                                                        'alt' =>
                                                            'Fotografía de ' .
                                                            $jugador->nombres,

                                                        'style' => '
                                                            width:75px;
                                                            height:75px;
                                                            object-fit:cover;
                                                            border-radius:8px;
                                                            border:1px solid #ddd;
                                                        '
                                                    ]
                                                ) ?>

                                            <?php else: ?>

                                                Sin fotografía

                                            <?php endif; ?>

                                        </td>


                                        <!-- Nombres -->
                                        <td>
                                            <?= h(
                                                $jugador->nombres
                                            ) ?>
                                        </td>


                                        <!-- Apellidos -->
                                        <td>
                                            <?= h(
                                                $jugador->apellidos
                                            ) ?>
                                        </td>


                                        <!-- Fecha nacimiento -->
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


                                        <!-- Estado -->
                                        <td>

                                            <?php if ($estaSuspendido): ?>

                                                <span style="
                                                    background:#dc3545;
                                                    color:white;
                                                    padding:7px 12px;
                                                    border-radius:5px;
                                                    font-weight:bold;
                                                    display:inline-block;
                                                ">
                                                    SUSPENDIDO
                                                </span>

                                            <?php else: ?>

                                                <span style="
                                                    background:#28a745;
                                                    color:white;
                                                    padding:7px 12px;
                                                    border-radius:5px;
                                                    font-weight:bold;
                                                    display:inline-block;
                                                ">
                                                    HABILITADO
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div style="
                padding:20px;
                background:#f7f7f7;
                border-radius:8px;
                text-align:center;
            ">
                No existen jugadores registrados.
            </div>

        <?php endif; ?>


    <?php else: ?>

        <div style="
            padding:20px;
            background:#f7f7f7;
            border-radius:8px;
            text-align:center;
        ">

            Seleccione una jornada para generar el reporte.

        </div>

    <?php endif; ?>

</div>