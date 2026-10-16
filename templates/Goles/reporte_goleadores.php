<?php
/**
 * @var \App\View\AppView $this
 * @var iterable $goleadores
 */

$lista = [];
foreach ($goleadores as $g) {
    $lista[] = $g;
}
$maximo = 0;
foreach ($lista as $g) {
    $maximo = max($maximo, (int)$g->total_goles);
}
$podio = array_slice($lista, 0, 3);
/* Orden visual del podio: 2.º, 1.º, 3.º */
$ordenPodio = array_filter([1 => $podio[1] ?? null, 0 => $podio[0] ?? null, 2 => $podio[2] ?? null]);
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Tabla de goleadores',
        'lead' => 'Jugadores ordenados por la cantidad de goles anotados en el torneo.',
        'icon' => 'trophy',
        'tone' => 'gold',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Goles',
                ['controller' => 'Goles', 'action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                ['controller' => 'Goles', 'action' => 'add'],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="panel">
        <?php if (!empty($lista)): ?>
            <div class="podium" aria-label="Podio de goleadores">
                <?php foreach ($ordenPodio as $indice => $goleador): ?>
                    <?php
                    $puesto = $indice + 1;
                    $nombreCompleto = $goleador->nombres . ' ' . $goleador->apellidos;
                    $total = (int)$goleador->total_goles;
                    ?>
                    <div class="podium__place podium__place--<?= $puesto ?>">
                        <?= $this->element('avatar', [
                            'foto' => $goleador->fotografia,
                            'nombre' => $nombreCompleto,
                            'size' => 'lg',
                        ]) ?>
                        <span class="podium__name">
                            <?= $this->Html->link(
                                h($nombreCompleto),
                                ['controller' => 'Jugadores', 'action' => 'view', $goleador->jugador_id],
                                ['escape' => false, 'style' => 'color:inherit']
                            ) ?>
                        </span>
                        <span class="podium__team"><?= !empty($goleador->equipo) ? h($goleador->equipo) : 'Sin equipo' ?></span>
                        <div class="podium__step">
                            <span class="podium__rank"><?= $puesto ?>.º</span>
                            <span class="podium__goals"><?= $total ?> <small><?= $total === 1 ? 'gol' : 'goles' ?></small></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="panel__head">
                <h2 class="panel__title">Clasificación completa</h2>
                <span class="count-chip"><strong><?= count($lista) ?></strong> jugadores con goles</span>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Puesto</th>
                            <th>Jugador</th>
                            <th>Equipo</th>
                            <th>Goles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $i => $goleador): ?>
                            <?php
                            $puesto = $i + 1;
                            $nombreCompleto = $goleador->nombres . ' ' . $goleador->apellidos;
                            $total = (int)$goleador->total_goles;
                            $ancho = $maximo > 0 ? round($total / $maximo * 100) : 0;
                            ?>
                            <tr>
                                <td data-label="Puesto">
                                    <span class="rank <?= $puesto <= 3 ? 'rank--' . $puesto : '' ?>"><?= $puesto ?></span>
                                </td>
                                <td class="cell-main" data-label="Jugador">
                                    <div class="who">
                                        <?= $this->element('avatar', ['foto' => $goleador->fotografia, 'nombre' => $nombreCompleto]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($nombreCompleto),
                                                ['controller' => 'Jugadores', 'action' => 'view', $goleador->jugador_id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Jugador #<?= h($goleador->jugador_id) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Equipo">
                                    <?php if (!empty($goleador->equipo)): ?>
                                        <span class="tag tag--team"><?= $this->element('icon', ['name' => 'shield']) ?><?= h($goleador->equipo) ?></span>
                                    <?php else: ?>
                                        <span class="muted">Sin equipo</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Goles">
                                    <div class="bar">
                                        <span class="bar__track"><span class="bar__fill" style="--w: <?= $ancho ?>%"></span></span>
                                        <span class="bar__value"><?= $total ?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'trophy']) ?></span>
                <p class="empty__title">La tabla está vacía</p>
                <p class="empty__text">Registra los goles de una jornada y aquí aparecerá el ranking.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                    ['controller' => 'Goles', 'action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
