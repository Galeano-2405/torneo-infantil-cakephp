<?php
/**
 * Avatar de jugador: fotografía o iniciales.
 *
 * @var \App\View\AppView $this
 * @var string|null $foto     Nombre del archivo dentro de webroot/img/jugadores
 * @var string|null $nombre   Nombre completo (para alt e iniciales)
 * @var string|null $size     'sm' | 'md' | 'lg' | 'xl'
 */

$nombre = trim((string)($nombre ?? ''));
$size = $size ?? 'md';

$iniciales = '';
foreach (preg_split('/\s+/', $nombre) ?: [] as $parte) {
    if ($parte !== '' && mb_strlen($iniciales) < 2) {
        $iniciales .= mb_strtoupper(mb_substr($parte, 0, 1));
    }
}
if ($iniciales === '') {
    $iniciales = '?';
}
?>
<span class="avatar avatar--<?= h($size) ?>">
    <?php if (!empty($foto)): ?>
        <?= $this->Html->image(
            'jugadores/' . $foto,
            ['alt' => 'Fotografía de ' . $nombre, 'loading' => 'lazy']
        ) ?>
    <?php else: ?>
        <span class="avatar__initials" aria-hidden="true"><?= h($iniciales) ?></span>
    <?php endif; ?>
</span>
