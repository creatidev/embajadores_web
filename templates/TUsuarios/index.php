<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TUsuario[]|\Cake\Collection\CollectionInterface $users
 * @var $count
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Usuarios','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="users index content">
    <?= $this->Html->link(__('Nuevo Usuario'), ['controller'=>'tUsuarios','action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __("Usuarios registrados: $count") ?></h3>
    <?= $this->Form->create(null,['type'=>'get']) ?>
    <?= $this->Form->control('key',['label'=>'Buscar']) ?>
    <?= $this->Form->submit('Consultar') ?>
    <?= $this->Form->end() ?>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id_usuario','ID') ?></th>
                <th><?= $this->Paginator->sort('id_rol','Rol') ?></th>
                <th><?= $this->Paginator->sort('usu_nombre','Nombre') ?></th>
                <th><?= $this->Paginator->sort('usu_apellidos','Apellidos') ?></th>
                <th><?= $this->Paginator->sort('usu_email','Correo electrónico') ?></th>
                <th><?= $this->Paginator->sort('usu_estado','Activo') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id_usuario) ?></td>
                    <td><?= h($user->t_role->rol_nombre)  ?></td>
                    <td><?= h($user->usu_nombre) ?></td>
                    <td><?= h($user->usu_apellidos) ?></td>
                    <td><?= h($user->usu_email) ?></td>
                    <td><?= $user->usu_estado ? __("Si") : __("No") ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'update', $user->id_usuario]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primera')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) fuera de {{count}} total')) ?></p>
    </div>
</div>
