<?php
/**
 * Encabezado estándar de cada pantalla.
 *
 * @var \App\View\AppView $this
 * @var string $title
 * @var string|null $lead
 * @var string $icon
 * @var string|null $tone     '' | 'gold' | 'red' | 'turf' | 'blue'
 * @var string|null $actions  HTML de los botones de la derecha
 */
$this->assign('title', strip_tags($title));
$tone = !empty($tone) ? ' page-head__icon--' . h($tone) : '';
?>
<header class="page-head">
    <div class="page-head__main">
        <span class="page-head__icon<?= $tone ?>"><?= $this->element('icon', ['name' => $icon]) ?></span>
        <div>
            <h1 class="page-title"><?= h($title) ?></h1>
            <?php if (!empty($lead)): ?>
                <p class="page-lead"><?= h($lead) ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($actions)): ?>
        <div class="page-head__actions"><?= $actions ?></div>
    <?php endif; ?>
</header>
