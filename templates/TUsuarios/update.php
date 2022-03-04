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
                <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $user->id_usuario], ['class' => 'side-nav-item']) ?>
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
                        <th><?= __('Rol actual') ?></th>
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
                        <th><?= __('Está activo') ?></th>
                        <td><?= $user->usu_estado ? __('Si') : __('No') ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Creado') ?></th>
                        <td><?= h($user->usu_fecha_creacion) ?></td>
                    </tr>
                </table>
            </div>
            <div class="tUsuarios form content">
                <?php
                    $formattedRoles = [];
                    foreach ($roles as $row) {
                        $formattedRoles[$row['id_rol']] = $row['rol_nombre'];
                    }
                    $roles = $formattedRoles;
                ?>
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <?= $this->Form->control('usu_estado',['type'=>'checkbox','label'=>'Activo']); ?>
                    <?= $this->Form->control('id_rol',['type'=>'select','label'=>'Asignar rol', 'options'=>$roles]); ?>
                    <p id="description"></p>
                </fieldset>

                <?= $this->Form->button(__('Actualizar')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php $this->append('script'); ?>
    <script>
        $().ready(function() {
            $("#id-rol").change(function() {
                let id_rol = $(this).val();
                if(id_rol === '1') $("#description").html("- No compatible con la aplicación móvil. <br/> - Administra la plataforma web.")
                if(id_rol === '2') $("#description").html("- Compatible con la aplicación móvil. <br/> - Administra la plataforma web. <br/> - Registro de incidentes. <br/> - Visualiza estado global de incidentes. <br/> - Visualiza estado global de tiendas. <br/> - Reportería de incidentes.")
                if(id_rol === '3') $("#description").html("- Compatible con la aplicación móvil. <br/> - Registro de incidentes. <br/> - Visualiza estado global de incidentes.")
                if(id_rol === '4') $("#description").html("- Compatible con la aplicación móvil. <br/> - Visualiza estado global de incidentes. <br/> - Visualiza estado global de tiendas.")
            }).change();
        });
    </script>
<?php $this->end();
