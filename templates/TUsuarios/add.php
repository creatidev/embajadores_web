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
        ['title' => 'Registro','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
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
                <legend><?= __('Registro de usuario') ?></legend>
                <?php
                    echo $this->Form->control('id_rol',['empty'=>true,'default'=>'','type'=>'select','label'=>'Seleccionar rol', 'options'=>$roles]);
                    echo $this->Form->control('usu_dni',['label'=>'Cedula']);
                    echo $this->Form->control('usu_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('usu_apellidos',['label'=>'Apellidos']);
                    echo $this->Form->control('usu_email',['label'=>'Email']);
                    echo $this->Form->control('usu_celular',['label'=>'Celular']);
                    echo $this->Form->control('password',['type'=>'password','label'=>'Contraseña']);
                    echo $this->Form->control('retype_password',['type'=>'password','label'=>'Reescriba la contraseña']);
                    echo $this->Form->control('usu_estado',['type'=>'checkbox','label'=>'Activo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php $this->append('script'); ?>
    <script>
        $().ready(function() {
            $("#id-rol").change(function() {
                let id_rol = $(this).val();
                if(id_rol === '1') alert("Este rol no compatible con la aplicación móvil.");
            }).change();
        });
    </script>
<?php $this->end();
