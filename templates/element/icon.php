<?php
/**
 * Íconos SVG del sistema (trazo de 1.8px, 24x24).
 *
 * Uso: <?= $this->element('icon', ['name' => 'shield']) ?>
 *      <?= $this->element('icon', ['name' => 'ball', 'class' => 'icon--lg']) ?>
 *
 * @var \App\View\AppView $this
 * @var string $name
 * @var string|null $class
 */

$paths = [
    'home' => '<path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V20h5v-6h4v6h5V9.5"/>',
    'shield' => '<path d="M12 3 4.5 6v5.5c0 4.6 3.1 8.3 7.5 9.5 4.4-1.2 7.5-4.9 7.5-9.5V6L12 3Z"/><path d="M12 3v18"/><path d="M4.6 11h14.8"/>',
    'shirt' => '<path d="M8 3 3.5 5.5 5 10l2-.8V21h10V9.2l2 .8 1.5-4.5L16 3c-.6 1.6-2.2 2.6-4 2.6S8.6 4.6 8 3Z"/>',
    'calendar' => '<rect x="3.5" y="5" width="17" height="15.5" rx="2.5"/><path d="M3.5 10h17M8 3v4M16 3v4"/><path d="M8 14h2M14 14h2M8 17h2"/>',
    'ball' => '<circle cx="12" cy="12" r="9"/><path d="m12 7.2 3.6 2.6-1.4 4.2H9.8L8.4 9.8 12 7.2Z"/><path d="M12 3v4.2M15.6 9.8l4.6-1.6M14.2 14l2.8 3.9M9.8 14 7 17.9M8.4 9.8 3.8 8.2"/>',
    'card' => '<rect x="6.5" y="3" width="11" height="16" rx="1.8" transform="rotate(10 12 11)"/><path d="M4 21h9"/>',
    'cards' => '<rect x="3.5" y="5" width="9" height="13.5" rx="1.6" transform="rotate(-8 8 11.75)"/><rect x="11" y="4.5" width="9" height="13.5" rx="1.6" transform="rotate(8 15.5 11.25)"/>',
    'trophy' => '<path d="M8 4h8v5a4 4 0 0 1-8 0V4Z"/><path d="M8 6H5a3 3 0 0 0 3 4M16 6h3a3 3 0 0 1-3 4"/><path d="M12 13v4M8.5 20.5h7M9.5 17h5l.8 3.5h-6.6L9.5 17Z"/>',
    'whistle' => '<circle cx="9" cy="14" r="5.5"/><path d="M12.6 9.8 20.5 7v4l-6.3 1.7"/><path d="M9 14h.01"/><path d="M6 4l1.2 2.6M10.5 3v2.8"/>',
    'clipboard' => '<rect x="5" y="4.5" width="14" height="16.5" rx="2"/><path d="M9 4.5V3h6v1.5"/><path d="M8.5 10h7M8.5 13.5h7M8.5 17h4"/>',
    'plus' => '<path d="M12 5v14M5 12h14"/>',
    'edit' => '<path d="M4 20h4L19 9l-4-4L4 16v4Z"/><path d="m13.5 6.5 4 4"/>',
    'eye' => '<path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/><circle cx="12" cy="12" r="3"/>',
    'trash' => '<path d="M4.5 7h15M10 7V4.5h4V7"/><path d="M6.5 7 7.5 20h9l1-13"/><path d="M10 11v5.5M14 11v5.5"/>',
    'arrow-left' => '<path d="M19 12H5M11 6l-6 6 6 6"/>',
    'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
    'chevron-left' => '<path d="m15 6-6 6 6 6"/>',
    'chevron-right' => '<path d="m9 6 6 6-6 6"/>',
    'chevrons-left' => '<path d="m12 6-6 6 6 6M18 6l-6 6 6 6"/>',
    'chevrons-right' => '<path d="m6 6 6 6-6 6M12 6l6 6-6 6"/>',
    'menu' => '<path d="M4 7h16M4 12h16M4 17h10"/>',
    'close' => '<path d="M6 6l12 12M18 6 6 18"/>',
    'check' => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
    'check-circle' => '<circle cx="12" cy="12" r="9"/><path d="m8 12.3 2.8 2.8L16.2 9.6"/>',
    'alert' => '<path d="M12 3.5 2.5 20h19L12 3.5Z"/><path d="M12 10v4.5M12 17.5h.01"/>',
    'info' => '<circle cx="12" cy="12" r="9"/><path d="M12 11v5.5M12 7.8h.01"/>',
    'ban' => '<circle cx="12" cy="12" r="9"/><path d="m5.7 5.7 12.6 12.6"/>',
    'upload' => '<path d="M12 15V4M7.5 8.5 12 4l4.5 4.5"/><path d="M4 15v3.5A2.5 2.5 0 0 0 6.5 21h11a2.5 2.5 0 0 0 2.5-2.5V15"/>',
    'user' => '<circle cx="12" cy="8" r="4"/><path d="M4.5 20.5c1.2-3.6 4-5.5 7.5-5.5s6.3 1.9 7.5 5.5"/>',
    'users' => '<circle cx="9" cy="8.5" r="3.5"/><path d="M2.5 19.5c.9-3 3.4-4.8 6.5-4.8s5.6 1.8 6.5 4.8"/><path d="M15.5 5.3a3.5 3.5 0 0 1 0 6.4M17.5 14.9c2 .6 3.4 2.2 4 4.6"/>',
    'search' => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/>',
    'filter' => '<path d="M4 5h16l-6.2 7.6V19l-3.6 1.5v-7.9L4 5Z"/>',
    'refresh' => '<path d="M20 11a8 8 0 0 0-14.6-4.5L4 8"/><path d="M4 4v4h4"/><path d="M4 13a8 8 0 0 0 14.6 4.5L20 16"/><path d="M20 20v-4h-4"/>',
    'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.2 2"/>',
    'medal' => '<path d="M8 3h8l-2.2 5.2h-3.6L8 3Z"/><circle cx="12" cy="15" r="5.5"/><path d="m12 12.3.9 1.8 2 .3-1.4 1.4.3 2-1.8-.9-1.8.9.3-2-1.4-1.4 2-.3.9-1.8Z"/>',
    'image' => '<rect x="3.5" y="4.5" width="17" height="15" rx="2.5"/><circle cx="9" cy="9.5" r="1.8"/><path d="m4 17 4.8-4.6 3.7 3.4 2.6-2.4L20 18"/>',
    'list' => '<path d="M9 6.5h11M9 12h11M9 17.5h11"/><path d="M4.5 6.5h.01M4.5 12h.01M4.5 17.5h.01"/>',
    'goal' => '<path d="M2.5 18.5V6.5h19v12"/><path d="M2.5 10.5h4l1 8M21.5 10.5h-4l-1 8M7.5 18.5h9"/><path d="M6.5 6.5v4M17.5 6.5v4M10 6.5v12M14 6.5v12M2.5 14.5h19" opacity=".45"/>',
];

$name = $name ?? 'info';
$svgPath = $paths[$name] ?? $paths['info'];
$extraClass = isset($class) ? ' ' . h($class) : '';
?>
<svg class="icon<?= $extraClass ?>" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><?= $svgPath ?></svg>
