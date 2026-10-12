<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jornada $jornada
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jornada->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jornada->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jornadas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="jornadas form content">
            <?= $this->Form->create($jornada) ?>
            <fieldset>
                <legend><?= __('Edit Jornada') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('fecha');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
