<?php
/**
 * Campos compartidos del formulario de incidencias.
 *
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 * @var bool $nueva
 */
$nueva = $nueva ?? false;
?>
<div class="form-section">
    <div>
        <h2 class="form-section__title">Jugador y tarjeta</h2>
        <p class="form-section__text">Elige al jugador y el color de la tarjeta que mostró el árbitro.</p>
    </div>
    <div class="form-grid">
        <div class="field span-2">
            <?= $this->Form->control('jugador_id', array_filter([
                'label' => 'Jugador',
                'options' => $jugadors,
                'empty' => $nueva ? 'Selecciona un jugador' : null,
            ], fn($v) => $v !== null)) ?>
        </div>
        <div class="field span-2 card-picker">
            <?= $this->Form->control('tipo_tarjeta', [
                'label' => 'Tipo de tarjeta',
                'type' => 'radio',
                'options' => [
                    'Amarilla' => 'Amarilla',
                    'Roja' => 'Roja',
                ],
            ]) ?>
        </div>
    </div>
</div>

<div class="form-section">
    <div>
        <h2 class="form-section__title">Detalle</h2>
        <p class="form-section__text">Si hay suspensión, el jugador aparece como suspendido en la jornada de esa fecha.</p>
    </div>
    <div class="form-grid">
        <div class="field span-2">
            <?= $this->Form->control('descripcion', [
                'label' => 'Motivo',
                'type' => 'textarea',
                'rows' => 3,
                'placeholder' => 'Ejemplo: entrada peligrosa, conducta antideportiva…',
            ]) ?>
        </div>
        <div class="field">
            <?= $this->Form->control('fecha_incidencia', [
                'label' => 'Fecha de la incidencia',
            ]) ?>
        </div>
        <div class="field">
            <?= $this->Form->control('fecha_suspension', [
                'label' => 'Suspendido para la fecha',
                'empty' => true,
            ]) ?>
            <p class="hint">Déjalo vacío si no hay suspensión.</p>
        </div>
    </div>
</div>
