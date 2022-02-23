<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUsuario $user
 * @var $roles
 */
?>
<div class="row">
        <div class="center" style="width: 350px">
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
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_mjlh3hcy.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <p style="text-align: justify; text-justify: inter-word;"><?= __('A continuación ingrese los datos solicitados. Una vez registrado, contacte a un administrador o supervisor para ser dado de alta.') ?></p>
                    <br>
                    <?php
                        echo $this->Form->control('usu_dni',['label'=>'Cedula']);
                        echo $this->Form->control('usu_nombre',['label'=>'Nombre']);
                        echo $this->Form->control('usu_apellidos',['label'=>'Apellidos']);
                        echo $this->Form->control('usu_email',['label'=>'Email']);
                        echo $this->Form->control('usu_celular',['label'=>'Celular','required'=>true]);
                        echo $this->Form->control('password',['type'=>'password','label'=>'Contraseña']);
                        echo $this->Form->control('retype_password',['type'=>'password','label'=>'Reescriba la contraseña']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Registrar')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
</div>
