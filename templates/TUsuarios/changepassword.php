<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUsuario $user
 */
?>
<?php
$this->Breadcrumbs->add([
    ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
    ['title' => 'Usuarios','url' => ['controller' => 'tUsuarios', 'action' => 'index']],
    ['title' => 'Usuario: '.$user->usu_nombre.' '.$user->usu_apellidos,'url' => '#']
]);
$this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Cancelar...'), ['action' => 'update', $user->id_usuario], ['class' => 'side-nav-item']) ?>
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
