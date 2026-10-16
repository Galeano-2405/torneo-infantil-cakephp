<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 */
$jugador = $incidencia->jugador ?? null;
$nombreCompleto = $jugador
    ? $jugador->nombres . ' ' . $jugador->apellidos
    : 'Jugador #' . $incidencia->jugador_id;
$esRoja = $incidencia->tipo_tarjeta === 'Roja';
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Detalle de incidencia',
        'icon' => 'card',
        'tone' => 'red',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Incidencias',
                ['action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'edit']) . 'Editar',
                ['action' => 'edit', $incidencia->id],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="detail-hero">
        <?= $this->element('avatar', [
            'foto' => $jugador->fotografia ?? null,
            'nombre' => $nombreCompleto,
            'size' => 'lg',
        ]) ?>
        <div>
            <h2 class="detail-hero__title"><?= h($nombreCompleto) ?></h2>
            <div class="detail-hero__meta">
                <?php if (!empty($jugador->equipo)): ?>
                    <span class="tag"><?= $this->element('icon', ['name' => 'shield']) ?><?= h($jugador->equipo->nombre) ?></span>
                <?php endif; ?>
                <span class="tag">Incidencia #<?= $incidencia->id ?></span>
            </div>
        </div>
        <div class="modal__card" style="margin:0 12px 0 0;width:64px;height:88px;background:var(--<?= $esRoja ? 'red' : 'gold' ?>)" role="img" aria-label="Tarjeta <?= $esRoja ? 'roja' : 'amarilla' ?>"></div>
    </section>

    <section class="panel" style="margin-top:22px">
        <div class="panel__body">
            <span class="fact__label">Motivo</span>
            <p style="font-size:20px;font-weight:500;margin-top:4px"><?= h($incidencia->descripcion) ?></p>
        </div>
        <div class="facts" style="border-top:1px solid var(--line)">
            <div class="fact">
                <span class="fact__label">Tarjeta</span>
                <span class="fact__value"><span class="ref-card ref-card--<?= $esRoja ? 'roja' : 'amarilla' ?>"><?= $esRoja ? 'Roja' : 'Amarilla' ?></span></span>
            </div>
            <div class="fact">
                <span class="fact__label">Fecha de la incidencia</span>
                <span class="fact__value"><?= !empty($incidencia->fecha_incidencia) ? h($incidencia->fecha_incidencia->format('d/m/Y')) : 'Sin fecha' ?></span>
            </div>
            <div class="fact">
                <span class="fact__label">Suspendido para</span>
                <span class="fact__value" style="<?= !empty($incidencia->fecha_suspension) ? 'color:var(--red)' : '' ?>">
                    <?= !empty($incidencia->fecha_suspension) ? h($incidencia->fecha_suspension->format('d/m/Y')) : 'Sin suspensión' ?>
                </span>
            </div>
            <div class="fact">
                <span class="fact__label">Jugador</span>
                <span class="fact__value">
                    <?= $jugador
                        ? $this->Html->link(h($nombreCompleto), ['controller' => 'Jugadores', 'action' => 'view', $jugador->id], ['escape' => false])
                        : h($nombreCompleto) ?>
                </span>
            </div>
        </div>
    </section>

    <div class="bottom-actions">
        <?= $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Volver a incidencias',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ) ?>
        <?= $this->Form->postLink(
            $this->element('icon', ['name' => 'trash']) . 'Eliminar incidencia',
            ['action' => 'delete', $incidencia->id],
            [
                'confirm' => '¿Eliminar esta incidencia?',
                'class' => 'btn btn--danger',
                'escape' => false,
            ]
        ) ?>
    </div>

</div>
