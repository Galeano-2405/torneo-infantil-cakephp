<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Incidencia $incidencia
 * @var \Cake\Collection\CollectionInterface|string[] $jugadors
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>

            <?= $this->Html->link(
                __('Lista de incidencias'),
                ['action' => 'index'],
                ['class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>

    <div class="column column-80">
        <div class="incidencias form content">

            <?= $this->Form->create($incidencia) ?>

            <fieldset>
                <legend><?= __('Registrar Incidencia') ?></legend>

                <?php

                echo $this->Form->control('jugador_id', [
                    'options' => $jugadors,
                    'label' => 'Jugador',
                    'empty' => 'Seleccione un jugador'
                ]);

                echo $this->Form->control('descripcion', [
                    'label' => 'Descripción',
                    'type' => 'textarea',
                    'rows' => 3
                ]);

                echo $this->Form->control('tipo_tarjeta', [
                    'label' => 'Tipo de tarjeta',
                    'type' => 'select',
                    'options' => [
                        'Amarilla' => 'Amarilla',
                        'Roja' => 'Roja'
                    ],
                    'empty' => 'Seleccione el tipo de tarjeta',
                    'id' => 'tipo-tarjeta'
                ]);

                echo $this->Form->control('fecha_incidencia', [
                    'label' => 'Fecha de incidencia'
                ]);

                ?>

                <div id="contenedor-suspension">
                    <?= $this->Form->control('fecha_suspension', [
                        'label' => 'Fecha de suspensión',
                        'empty' => true,
                        'required' => false,
                        'id' => 'fecha-suspension'
                    ]) ?>
                </div>

            </fieldset>

            <?= $this->Form->button(__('Guardar incidencia')) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const tipoTarjeta = document.getElementById('tipo-tarjeta');
    const fechaSuspension = document.getElementById('fecha-suspension');
    const contenedorSuspension = document.getElementById('contenedor-suspension');

    function actualizarSuspension() {

        if (tipoTarjeta.value === 'Roja') {

            contenedorSuspension.style.display = 'block';
            fechaSuspension.required = true;

        } else {

            contenedorSuspension.style.display = 'none';
            fechaSuspension.required = false;
            fechaSuspension.value = '';
        }
    }

    tipoTarjeta.addEventListener('change', actualizarSuspension);

    actualizarSuspension();
});
</script>