<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gole $gole
 */
$cantidad = (int)$gole->cantidad;
$nombreCompleto = $gole->hasValue('jugador')
    ? $gole->jugador->nombres . ' ' . $gole->jugador->apellidos
    : 'Jugador #' . $gole->jugador_id;
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Detalle de anotación',
        'icon' => 'ball',
        'tone' => 'gold',
        'actions' =>
            $this->Html->link(
                $this->element('icon', ['name' => 'arrow-left']) . 'Goles',
                ['action' => 'index'],
                ['class' => 'btn btn--ghost', 'escape' => false]
            ) .
            $this->Html->link(
                $this->element('icon', ['name' => 'edit']) . 'Editar',
                ['action' => 'edit', $gole->id],
                ['class' => 'btn btn--primary', 'escape' => false]
            ),
    ]) ?>

    <section class="detail-hero">
        <svg class="detail-hero__pitch" viewBox="0 0 400 300" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M120 300V200h160v100M160 300v-50h80v50"/><path d="M160 200a40 40 0 0 1 80 0"/>
        </svg>
        <?= $this->element('avatar', [
            'foto' => $gole->jugador->fotografia ?? null,
            'nombre' => $nombreCompleto,
            'size' => 'lg',
        ]) ?>
        <div>
            <h2 class="detail-hero__title"><?= h($nombreCompleto) ?></h2>
            <div class="detail-hero__meta">
                <?php if ($gole->hasValue('jornada')): ?>
                    <?= $this->Html->link(
                        $this->element('icon', ['name' => 'calendar']) . h($gole->jornada->nombre),
                        ['controller' => 'Jornadas', 'action' => 'view', $gole->jornada->id],
                        ['class' => 'tag', 'escape' => false]
                    ) ?>
                <?php endif; ?>
                <span class="tag">Registro #<?= $gole->id ?></span>
            </div>
        </div>
        <div class="scorebox">
            <span class="scorebox__value"><?= $cantidad ?></span>
            <span class="scorebox__label"><?= $cantidad === 1 ? 'gol' : 'goles' ?></span>
        </div>
    </section>

    <section class="panel" style="margin-top:22px">
        <div class="facts">
            <div class="fact">
                <span class="fact__label">Jugador</span>
                <span class="fact__value">
                    <?= $gole->hasValue('jugador')
                        ? $this->Html->link(h($nombreCompleto), ['controller' => 'Jugadores', 'action' => 'view', $gole->jugador->id], ['escape' => false])
                        : h($nombreCompleto) ?>
                </span>
            </div>
            <div class="fact">
                <span class="fact__label">Jornada</span>
                <span class="fact__value">
                    <?= $gole->hasValue('jornada')
                        ? $this->Html->link($gole->jornada->nombre, ['controller' => 'Jornadas', 'action' => 'view', $gole->jornada->id])
                        : 'Sin jornada' ?>
                </span>
            </div>
            <div class="fact">
                <span class="fact__label">Registrado el</span>
                <span class="fact__value"><?= !empty($gole->created) ? h($gole->created->format('d/m/Y H:i')) : 'Sin fecha' ?></span>
            </div>
            <div class="fact">
                <span class="fact__label">Última modificación</span>
                <span class="fact__value"><?= !empty($gole->modified) ? h($gole->modified->format('d/m/Y H:i')) : 'Sin fecha' ?></span>
            </div>
        </div>
    </section>

    <div class="bottom-actions">
        <?= $this->Html->link(
            $this->element('icon', ['name' => 'arrow-left']) . 'Volver a goles',
            ['action' => 'index'],
            ['class' => 'btn btn--ghost', 'escape' => false]
        ) ?>
        <?= $this->Form->postLink(
            $this->element('icon', ['name' => 'trash']) . 'Eliminar registro',
            ['action' => 'delete', $gole->id],
            [
                'confirm' => '¿Eliminar este registro de goles?',
                'class' => 'btn btn--danger',
                'escape' => false,
            ]
        ) ?>
    </div>

</div>
