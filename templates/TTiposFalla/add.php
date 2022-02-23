<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTiposFalla $tTiposFalla
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List T Tipos Falla'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiposFalla form content">
            <?= $this->Form->create($tTiposFalla) ?>
            <fieldset>
                <legend><?= __('Add T Tipos Falla') ?></legend>
                <?php
                    echo $this->Form->control('tpf_nombre');
                    echo $this->Form->control('tpf_estado');
                    echo $this->Form->control('tpf_fecha_creacion');
                    echo $this->Form->control('tpf_eliminado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
