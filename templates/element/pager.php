<?php
/**
 * Paginación estándar de las listas.
 *
 * @var \App\View\AppView $this
 * @var string $nombre  Ej.: 'equipos', 'jugadores'
 */
$nombre = $nombre ?? 'registros';
$this->Paginator->setTemplates([
    'first' => '<li class="first"><a href="{{url}}" aria-label="Primera página">{{text}}</a></li>',
    'last' => '<li class="last"><a href="{{url}}" aria-label="Última página">{{text}}</a></li>',
    'prevActive' => '<li class="prev"><a rel="prev" href="{{url}}" aria-label="Página anterior">{{text}}</a></li>',
    'prevDisabled' => '<li class="prev disabled"><span>{{text}}</span></li>',
    'nextActive' => '<li class="next"><a rel="next" href="{{url}}" aria-label="Página siguiente">{{text}}</a></li>',
    'nextDisabled' => '<li class="next disabled"><span>{{text}}</span></li>',
    'current' => '<li class="active"><span aria-current="page">{{text}}</span></li>',
]);
$i = fn(string $n) => $this->element('icon', ['name' => $n, 'class' => 'icon--sm']);
?>
<div class="pager">
    <p class="pager__info">
        <?= $this->Paginator->counter(
            'Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} ' . h($nombre)
        ) ?>
    </p>
    <ul class="pagination">
        <?= $this->Paginator->first($i('chevrons-left'), ['escape' => false]) ?>
        <?= $this->Paginator->prev($i('chevron-left'), ['escape' => false]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next($i('chevron-right'), ['escape' => false]) ?>
        <?= $this->Paginator->last($i('chevrons-right'), ['escape' => false]) ?>
    </ul>
</div>
