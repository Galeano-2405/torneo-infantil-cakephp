<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$tipo = 'info';
foreach (['success', 'error', 'warning'] as $posible) {
    if (!empty($params['class']) && str_contains((string)$params['class'], $posible)) {
        $tipo = $posible;
    }
}
echo $this->element('toast', [
    'message' => $message,
    'params' => $params,
    'type' => $tipo,
]);
