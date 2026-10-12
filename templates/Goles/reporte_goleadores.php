<?php
/**
 * @var \App\View\AppView $this
 * @var iterable $goleadores
 */
?>

<div class="goles index content">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

        <h3><?= __('Reporte de Goleadores') ?></h3>

        <?= $this->Html->link(
            __('Volver a Goles'),
            ['action' => 'index'],
            ['class' => 'button']
        ) ?>

    </div>

    <div class="table-responsive">

        <table>

            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Fotografía</th>
                    <th>Jugador</th>
                    <th>Equipo</th>
                    <th>Total de goles</th>
                </tr>
            </thead>

            <tbody>

                <?php $posicion = 1; ?>

                <?php foreach ($goleadores as $registro): ?>

                    <tr>

                        <td>
                            <strong>
                                <?= $posicion++ ?>
                            </strong>
                        </td>

                        <td>

                            <?php if (!empty($registro->fotografia)): ?>

                                <?= $this->Html->image(
                                    'jugadores/' . $registro->fotografia,
                                    [
                                        'alt' => 'Fotografía de ' . $registro->nombres,
                                        'style' => '
                                            width:75px;
                                            height:75px;
                                            object-fit:cover;
                                            border-radius:10px;
                                            border:1px solid #ddd;
                                        '
                                    ]
                                ) ?>

                            <?php else: ?>

                                <span>Sin fotografía</span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?= h(
                                $registro->nombres .
                                ' ' .
                                $registro->apellidos
                            ) ?>

                        </td>

                        <td>

                            <?= h(
                                $registro->equipo ?? 'Sin equipo'
                            ) ?>

                        </td>

                        <td>

                            <strong>
                                <?= h($registro->total_goles) ?>
                            </strong>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>