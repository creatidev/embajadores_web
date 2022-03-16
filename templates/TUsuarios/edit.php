<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUsuario $user
 * @var $roles
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
            <?= $this->Form->postLink(
                __('Eliminar...'),
                ['action' => 'delete', $user->id_usuario],
                ['confirm' => __('¿Eliminar el usuario {0}?', $user->usu_email), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Cancelar...'), ['action' => 'update', $user->id_usuario], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de...'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tUsuarios form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('usu_dni',['label'=>'Cedula']);
                    echo $this->Form->control('usu_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('usu_apellidos',['label'=>'Apellidos']);
                    echo $this->Form->control('usu_email',['label'=>'Email']);
                    echo $this->Form->control('usu_celular',['label'=>'Celular']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
