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
        ['title' => 'Usuario: '.$user->usu_nombre.' '. $user->usu_apellidos,'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $user->id_usuario], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar...'), ['action' => 'delete', $user->id_usuario], ['confirm' => __('¿Eliminar el usuario {0}?', $user->usu_email), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de...'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tUsuarios view content">
            <?= $this->Html->link(__('Cambiar contraseña'), ['action' => 'changepassword', $user->id_usuario], ['class' => 'button float-right']) ?>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($user->usu_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellidos') ?></th>
                    <td><?= h($user->usu_apellidos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->usu_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($user->t_role->rol_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cedula') ?></th>
                    <td><?= h($user->usu_dni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($user->usu_celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activo') ?></th>
                    <td><?= $user->usu_estado ? __('Si') : __('No') ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($user->usu_fecha_creacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
