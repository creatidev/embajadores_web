<?php
/**
 * @var \App\View\AppView $this
 * @var $username
 */
?>
<legend><?= h($username['usu_nombre'].' '.$username['usu_apellidos']) ?></legend>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Administración') ?></h4>
            <?= $this->Html->link(__('Usuarios'), ['controller'=>'tUsuarios','action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Ciudades'), ['controller'=>'tCiudades','action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Servicios'), ['controller'=>'tServicios','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_zdl4vay3.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>    </div>
</div>
