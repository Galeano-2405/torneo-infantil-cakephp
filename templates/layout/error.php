<?php
/**
 * Layout de errores · Torneo Infantil
 *
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?: 'Error' ?> · Torneo Infantil de Fútbol</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('torneo') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <main class="error-page">
        <div class="error-page__box">
            <div class="toasts"><?= $this->Flash->render() ?></div>
            <?= $this->fetch('content') ?>
            <?= $this->Html->link(
                $this->element('icon', ['name' => 'home']) . 'Ir al inicio',
                '/',
                ['class' => 'btn btn--gold', 'escape' => false]
            ) ?>
        </div>
    </main>
</body>
</html>
