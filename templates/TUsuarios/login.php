<?php
/**
 * @var \App\View\AppView $this
 */
?>


<div class="row">
    <div class="content center" style="width: 350px">
        <div class="users form">
            <lottie-player class="center" src="https://assets6.lottiefiles.com/packages/lf20_gjmecwii.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <?= $this->Form->control('email', ['label'=>'Correo']) ?>
                <?= $this->Form->control('password', ['required' => true,'label'=>'Contraseña']) ?>
                <?= $this->Html->link('¿Olvidó su contraseña?',['controller'=>'tUsuarios','action'=>'forgotpassword']) ?>
            </fieldset>
            <br>
            <?= $this->Form->submit(__('Iniciar sesión'),['id'=>'login']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
