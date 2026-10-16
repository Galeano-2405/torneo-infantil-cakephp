<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;

$this->setLayout('error');

if (Configure::read('debug')) :
    $this->setLayout('dev_error');

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');
    echo $this->element('auto_table_warning');
    $this->end();
endif;

$this->assign('title', 'Página no encontrada');
?>
<div class="error-page__code">404</div>
<h2>Esta página no existe</h2>
<p>
    La dirección <strong><?= h($url) ?></strong> no se encontró.
    Revisa que esté bien escrita o vuelve al inicio.
</p>
