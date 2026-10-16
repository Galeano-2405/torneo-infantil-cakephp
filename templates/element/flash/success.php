<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
echo $this->element('toast', [
    'message' => $message,
    'params' => $params,
    'type' => 'success',
]);
