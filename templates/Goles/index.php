<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Gole> $goles
 */
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Goles',
        'lead' => 'Las anotaciones de cada jugador por jornada.',
        'icon' => 'ball',
        'tone' => 'gold',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'trophy']) . 'Ver goleadores',
                ['action' => 'reporteGoleadores'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                ['action' => 'add'],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Historial de anotaciones</h2>
            <span class="count-chip"><strong><?= $this->Paginator->param('count') ?? count($goles) ?></strong> registros</span>
        </div>

        <?php if (count($goles) > 0): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jugador</th>
                            <th>Jornada</th>
                            <th>Goles</th>
                            <th>Registrado el</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($goles as $gole): ?>
                            <?php
                            $nombreCompleto = $gole->hasValue('jugador')
                                ? $gole->jugador->nombres . ' ' . $gole->jugador->apellidos
                                : 'Jugador #' . $gole->jugador_id;
                            $cantidad = (int)$gole->cantidad;
                            ?>
                            <tr>
                                <td class="cell-main" data-label="Jugador">
                                    <div class="who">
                                        <?= $this->element('avatar', [
                                            'foto' => $gole->jugador->fotografia ?? null,
                                            'nombre' => $nombreCompleto,
                                        ]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($nombreCompleto),
                                                ['controller' => 'Jugadores', 'action' => 'view', $gole->jugador_id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Registro #<?= $gole->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Jornada">
                                    <?php if (!empty($gole->jornada)): ?>
                                        <span class="tag tag--date">
                                            <?= $this->element('icon', ['name' => 'calendar']) ?>
                                            <?= h($gole->jornada->nombre) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="muted">Sin jornada</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Goles">
                                    <span class="tag tag--goals">
                                        <?= $this->element('icon', ['name' => 'ball']) ?>
                                        <strong><?= $cantidad ?></strong> <?= $cantidad === 1 ? 'gol' : 'goles' ?>
                                    </span>
                                </td>
                                <td data-label="Registrado el">
                                    <?= !empty($gole->created) ? h($gole->created->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $gole->id,
                                        'confirm' => '¿Eliminar este registro de goles?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->element('pager', ['nombre' => 'registros']) ?>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'ball']) ?></span>
                <p class="empty__title">Todavía no hay goles</p>
                <p class="empty__text">Registra los goles de una jornada para armar la tabla de goleadores.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Registrar goles',
                    ['action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
