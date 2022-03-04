<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUsuario $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Cancelar...'), ['controller'=>'Pages','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tUsuarios form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Cambiar contraseña') ?></legend>
                <?php
                    echo $this->Form->control('password',['type'=>'password','label'=>'Contraseña']);
                    echo $this->Form->control('retype_password',['type'=>'password','label'=>'Reescriba la Contraseña']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
