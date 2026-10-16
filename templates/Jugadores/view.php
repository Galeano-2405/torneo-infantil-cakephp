<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jugadore $jugadore
 * @var int $totalGoles
 */

$nombreCompleto = $jugadore->nombres . ' ' . $jugadore->apellidos;

/* Edad calculada solo para mostrarla */
$edad = null;
if (!empty($jugadore->fecha_nacimiento)) {
    $edad = (new \DateTimeImmutable($jugadore->fecha_nacimiento->format('Y-m-d')))
        ->diff(new \DateTimeImmutable('today'))
        ->y;
}

$amarillas = 0;
$rojas = 0;
foreach ($jugadore->incidencias as $inc) {
    $inc->tipo_tarjeta === 'Roja' ? $rojas++ : $amarillas++;
}
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Perfil del jugador',
        'icon' => 'user',
        'tone' => 'blue',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Jugadores',
                ['action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'edit']) . 'Editar',
                ['action' => 'edit', $jugadore->id],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="detail-hero">
        <svg class="detail-hero__pitch" viewBox="0 0 400 300" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="200" cy="150" r="90"/><path d="M200 0v300"/><circle cx="200" cy="150" r="5" fill="currentColor"/>
        </svg>

        <?= $this->element('avatar', [
            'foto' => $jugadore->fotografia,
            'nombre' => $nombreCompleto,
            'size' => 'xl',
        ]) ?>

        <div>
            <h2 class="detail-hero__title"><?= h($nombreCompleto) ?></h2>
            <div class="detail-hero__meta">
                <?php if ($jugadore->hasValue('equipo')): ?>
                    <?= $this->Html->link(
                        $this->element('icon', ['name' => 'shield']) . h($jugadore->equipo->nombre),
                        ['controller' => 'Equipos', 'action' => 'view', $jugadore->equipo->id],
                        ['class' => 'tag', 'escape' => false]
                    ) ?>
                <?php else: ?>
                    <span class="tag">Sin equipo</span>
                <?php endif; ?>
                <span class="tag">Jugador #<?= $jugadore->id ?></span>
                <?php if ($edad !== null): ?>
                    <span class="tag"><?= $edad ?> años</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="scorebox">
            <span class="scorebox__value"><?= (int)$totalGoles ?></span>
            <span class="scorebox__label"><?= (int)$totalGoles === 1 ? 'gol en el torneo' : 'goles en el torneo' ?></span>
        </div>
    </section>

    <section class="panel" style="margin-top:22px">
        <div class="facts">
            <div class="fact">
                <span class="fact__label">Nombres</span>
                <span class="fact__value"><?= h($jugadore->nombres) ?></span>
            </div>
            <div class="fact">
                <span class="fact__label">Apellidos</span>
                <span class="fact__value"><?= h($jugadore->apellidos) ?></span>
            </div>
            <div class="fact">
                <span class="fact__label">Fecha de nacimiento</span>
                <span class="fact__value">
                    <?= !empty($jugadore->fecha_nacimiento) ? h($jugadore->fecha_nacimiento->format('d/m/Y')) : 'Sin fecha' ?>
                </span>
            </div>
            <div class="fact">
                <span class="fact__label">Tarjetas</span>
                <span class="fact__value">
                    <span class="ref-card ref-card--amarilla"><?= $amarillas ?></span>
                    &nbsp;
                    <span class="ref-card ref-card--roja"><?= $rojas ?></span>
                </span>
            </div>
        </div>
    </section>

    <div class="split">
        <section class="panel">
            <div class="panel__head">
                <h2 class="panel__title"><?= $this->element('icon', ['name' => 'ball']) ?>Goles por jornada</h2>
            </div>

            <?php if (!empty($jugadore->goles)): ?>
                <ul class="timeline">
                    <?php foreach ($jugadore->goles as $gol): ?>
                        <?php $cantidad = (int)$gol->cantidad; ?>
                        <li>
                            <span class="timeline__title"><?= h($gol->jornada->nombre ?? 'Sin jornada') ?></span>
                            <span class="timeline__side">
                                <span class="tag tag--goals">
                                    <strong><?= $cantidad ?></strong> <?= $cantidad === 1 ? 'gol' : 'goles' ?>
                                </span>
                            </span>
                            <span class="timeline__meta">
                                <?= !empty($gol->jornada->fecha) ? h($gol->jornada->fecha->format('d/m/Y')) : 'Sin fecha' ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="empty">
                    <span class="empty__icon"><?= $this->element('icon', ['name' => 'ball']) ?></span>
                    <p class="empty__title">Sin goles todavía</p>
                    <p class="empty__text">Cuando anote, sus goles aparecen aquí por jornada.</p>
                </div>
            <?php endif; ?>
        </section>

        <section class="panel">
            <div class="panel__head">
                <h2 class="panel__title"><?= $this->element('icon', ['name' => 'cards']) ?>Tarjetas y suspensiones</h2>
            </div>

            <?php if (!empty($jugadore->incidencias)): ?>
                <ul class="timeline timeline--cards">
                    <?php foreach ($jugadore->incidencias as $incidencia): ?>
                        <?php $esRoja = $incidencia->tipo_tarjeta === 'Roja'; ?>
                        <li class="<?= $esRoja ? 'is-roja' : 'is-amarilla' ?>">
                            <span class="timeline__title"><?= h($incidencia->descripcion) ?></span>
                            <span class="timeline__side">
                                <span class="ref-card ref-card--<?= $esRoja ? 'roja' : 'amarilla' ?>"><?= $esRoja ? 'Roja' : 'Amarilla' ?></span>
                            </span>
                            <span class="timeline__meta">
                                <span>
                                    <?= !empty($incidencia->fecha_incidencia) ? h($incidencia->fecha_incidencia->format('d/m/Y')) : 'Sin fecha' ?>
                                </span>
                                <?php if (!empty($incidencia->fecha_suspension)): ?>
                                    <span style="color:var(--red)">
                                        Suspendido para el <?= h($incidencia->fecha_suspension->format('d/m/Y')) ?>
                                    </span>
                                <?php else: ?>
                                    <span>Sin suspensión</span>
                                <?php endif; ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <div class="empty">
                    <span class="empty__icon"><?= $this->element('icon', ['name' => 'check']) ?></span>
                    <p class="empty__title">Juego limpio</p>
                    <p class="empty__text">Este jugador no tiene tarjetas registradas.</p>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <div class="bottom-actions">
        <?= $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Volver a jugadores',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ) ?>
        <?= $this->Form->postLink(
            $this->element('icon', ['name' => 'trash']) . 'Eliminar jugador',
            ['action' => 'delete', $jugadore->id],
            [
                'confirm' => '¿Eliminar a ' . $jugadore->nombres . '?',
                'class' => 'btn btn--danger',
                'escape' => false,
            ]
        ) ?>
    </div>

</div>
