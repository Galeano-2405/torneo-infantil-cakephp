<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
$totalJugadores = count($equipo->jugadores ?? []);
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Ficha del equipo',
        'icon' => 'shield',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Equipos',
                ['action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'edit']) . 'Editar',
                ['action' => 'edit', $equipo->id],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="detail-hero">
        <svg class="detail-hero__pitch" viewBox="0 0 400 300" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="200" cy="150" r="90"/><path d="M200 0v300"/><circle cx="200" cy="150" r="5" fill="currentColor"/>
        </svg>
        <span style="color:#fff"><?= $this->element('crest', ['nombre' => $equipo->nombre, 'size' => 'lg']) ?></span>
        <div>
            <h2 class="detail-hero__title"><?= h($equipo->nombre) ?></h2>
            <div class="detail-hero__meta">
                <span class="tag">Equipo #<?= $equipo->id ?></span>
                <?php if (!empty($equipo->created)): ?>
                    <span class="tag">Inscrito el <?= h($equipo->created->format('d/m/Y')) ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="scorebox">
            <span class="scorebox__value"><?= $totalJugadores ?></span>
            <span class="scorebox__label"><?= $totalJugadores === 1 ? 'jugador' : 'jugadores' ?></span>
        </div>
    </section>

    <section class="panel" style="margin-top:22px">
        <div class="panel__head">
            <h2 class="panel__title"><?= $this->element('icon', ['name' => 'users']) ?>Plantilla del equipo</h2>
            <?= $this->Html->link(
                $this->element('icon', ['name' => 'plus']) . 'Inscribir jugador',
                ['controller' => 'Jugadores', 'action' => 'add'],
                ['class' => 'btn btn--ghost btn--sm', 'escape' => false]
            ) ?>
        </div>

        <?php if (!empty($equipo->jugadores)): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jugador</th>
                            <th>Fecha de nacimiento</th>
                            <th>Inscrito el</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipo->jugadores as $jugadore): ?>
                            <?php $nombreCompleto = $jugadore->nombres . ' ' . $jugadore->apellidos; ?>
                            <tr>
                                <td class="cell-main" data-label="Jugador">
                                    <div class="who">
                                        <?= $this->element('avatar', ['foto' => $jugadore->fotografia, 'nombre' => $nombreCompleto]) ?>
                                        <div>
                                            <?= $this->Html->link(
                                                h($nombreCompleto),
                                                ['controller' => 'Jugadores', 'action' => 'view', $jugadore->id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Jugador #<?= $jugadore->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Nacimiento">
                                    <?= !empty($jugadore->fecha_nacimiento) ? h($jugadore->fecha_nacimiento->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td data-label="Inscrito el">
                                    <?= !empty($jugadore->created) ? h($jugadore->created->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $jugadore->id,
                                        'controller' => 'Jugadores',
                                        'confirm' => '¿Eliminar a ' . $jugadore->nombres . '?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'users']) ?></span>
                <p class="empty__title">Este equipo no tiene jugadores</p>
                <p class="empty__text">Inscribe un jugador y elige este equipo en el formulario.</p>
            </div>
        <?php endif; ?>
    </section>

    <div class="bottom-actions">
        <?= $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Volver a equipos',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ) ?>
        <?= $this->Form->postLink(
            $this->element('icon', ['name' => 'trash']) . 'Eliminar equipo',
            ['action' => 'delete', $equipo->id],
            [
                'confirm' => '¿Eliminar el equipo ' . $equipo->nombre . '?',
                'class' => 'btn btn--danger',
                'escape' => false,
            ]
        ) ?>
    </div>

</div>
