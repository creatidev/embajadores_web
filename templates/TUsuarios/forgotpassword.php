<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="center" style="width: 350px">
        <div class="tUsuarios form content">
            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_xvrofzfk.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Recuperar contraseña') ?></legend>
                <?php
                    echo $this->Form->control('email',['label'=>'Correo electrónico','required'=>'true']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar',['type' => 'submit'])) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
