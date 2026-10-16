<?php
/**
 * Escudo genérico con la inicial del equipo.
 *
 * @var \App\View\AppView $this
 * @var string $nombre
 * @var string|null $size  '' | 'lg'
 */
$nombre = trim((string)($nombre ?? ''));
$inicial = $nombre !== '' ? mb_strtoupper(mb_substr($nombre, 0, 1)) : '?';
$size = !empty($size) ? ' crest--' . h($size) : '';
?>
<span class="crest<?= $size ?>" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"><path d="M12 2.8 4.2 5.9v5.7c0 4.8 3.2 8.6 7.8 9.8 4.6-1.2 7.8-5 7.8-9.8V5.9L12 2.8Z" fill="currentColor" fill-opacity=".1"/></svg><span><?= h($inicial) ?></span></span>
