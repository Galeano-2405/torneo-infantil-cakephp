<?php
/**
 * Notificación visual para los mensajes Flash.
 *
 * @var \App\View\AppView $this
 * @var string $message
 * @var array $params
 * @var string $type  success | error | warning | info
 */

$params = $params ?? [];
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}

$iconos = [
    'success' => 'check',
    'error' => 'alert',
    'warning' => 'alert',
    'info' => 'info',
];
$type = isset($iconos[$type ?? '']) ? $type : 'info';
$life = $type === 'error' ? 8000 : 5000;
?>
<div class="toast toast--<?= h($type) ?>" role="<?= $type === 'error' ? 'alert' : 'status' ?>" data-life="<?= $life ?>">
    <span class="toast__icon"><?= $this->element('icon', ['name' => $iconos[$type]]) ?></span>
    <p class="toast__msg"><?= $message ?></p>
    <button type="button" class="toast__close" aria-label="Cerrar aviso">
        <?= $this->element('icon', ['name' => 'close', 'class' => 'icon--sm']) ?>
    </button>
    <span class="toast__timer" aria-hidden="true"></span>
</div>
