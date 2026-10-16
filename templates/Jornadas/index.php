<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jornada> $jornadas
 */

use Cake\I18n\Date;

$hoy = Date::today();
?>
<div class="reveal">

    <?= $this->element('page_head', [
        'title' => 'Jornadas',
        'lead' => 'El calendario de fechas del campeonato.',
        'icon' => 'calendar',
        'tone' => 'turf',
        'actions' => $this->Html->link(
            $this->element('icon', ['name' => 'plus']) . 'Nueva jornada',
            ['action' => 'add'],
            ['class' => 'btn btn--primary', 'escape' => false]
        ),
    ]) ?>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Calendario</h2>
            <span class="count-chip"><strong><?= $this->Paginator->param('count') ?? count($jornadas) ?></strong> jornadas programadas</span>
        </div>

        <?php if (count($jornadas) > 0): ?>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Jornada</th>
                            <th>Fecha del partido</th>
                            <th>Estado</th>
                            <th>Registrada el</th>
                            <th class="is-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jornadas as $jornada): ?>
                            <tr>
                                <td class="cell-main" data-label="Jornada">
                                    <div class="who">
                                        <span class="crest" aria-hidden="true" style="color:var(--turf)">
                                            <?= $this->element('icon', ['name' => 'calendar']) ?>
                                        </span>
                                        <div>
                                            <?= $this->Html->link(
                                                h($jornada->nombre),
                                                ['action' => 'view', $jornada->id],
                                                ['class' => 'who__name', 'escape' => false]
                                            ) ?>
                                            <span class="who__meta">Jornada #<?= $jornada->id ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Fecha">
                                    <?php if (!empty($jornada->fecha)): ?>
                                        <span class="tag tag--date">
                                            <?= $this->element('icon', ['name' => 'calendar']) ?>
                                            <?= h($jornada->fecha->format('d/m/Y')) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="muted">Sin fecha</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Estado">
                                    <?php if (empty($jornada->fecha)): ?>
                                        <span class="muted">Sin fecha</span>
                                    <?php elseif ($jornada->fecha < $hoy): ?>
                                        <span class="tag">Jugada</span>
                                    <?php elseif ($jornada->fecha == $hoy): ?>
                                        <span class="tag tag--ok">Hoy</span>
                                    <?php else: ?>
                                        <span class="tag tag--team">Próxima</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Registrada el">
                                    <?= !empty($jornada->created) ? h($jornada->created->format('d/m/Y')) : '<span class="muted">Sin fecha</span>' ?>
                                </td>
                                <td class="cell-actions is-right">
                                    <?= $this->element('row_actions', [
                                        'id' => $jornada->id,
                                        'confirm' => '¿Eliminar la ' . $jornada->nombre . '?',
                                    ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?= $this->element('pager', ['nombre' => 'jornadas']) ?>
        <?php else: ?>
            <div class="empty">
                <span class="empty__icon"><?= $this->element('icon', ['name' => 'calendar']) ?></span>
                <p class="empty__title">Todavía no hay jornadas</p>
                <p class="empty__text">Programa la primera jornada para empezar a registrar goles.</p>
                <?= $this->Html->link(
                    $this->element('icon', ['name' => 'plus']) . 'Nueva jornada',
                    ['action' => 'add'],
                    ['class' => 'btn btn--primary', 'escape' => false]
                ) ?>
            </div>
        <?php endif; ?>
    </section>

</div>
