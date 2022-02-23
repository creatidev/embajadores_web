<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TComponente[]|\Cake\Collection\CollectionInterface $tComponentes
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Servicios','url' => ['controller' => 'tServicios', 'action' => 'index']],
        ['title' => 'Componentes','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="tComponentes index content">
    <?= $this->Html->link(__('Nuevo Componente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Componentes') ?></h3>
    <?= $this->Form->create(null,['type'=>'get']) ?>
    <?= $this->Form->control('key',['label'=>'Buscar']) ?>
    <?= $this->Form->submit('Consultar') ?>
    <?= $this->Form->end() ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_componente',['label'=>'ID']) ?></th>
                    <th><?= $this->Paginator->sort('id_servicio',['label'=>'Servicio']) ?></th>
                    <th><?= $this->Paginator->sort('com_nombre',['label'=>'Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('com_estado',['label'=>'Activo']) ?></th>
                    <th><?= $this->Paginator->sort('com_fecha_creacion',['label'=>'Creado']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tComponentes as $tComponente): ?>
                <tr>
                    <td><?= $this->Number->format($tComponente->id_componente) ?></td>
                    <td><?= $tComponente->t_servicio->ser_nombre ?></td>
                    <td><?= h($tComponente->com_nombre) ?></td>
                    <td><?= h($tComponente->com_estado) ?></td>
                    <td><?= h($tComponente->com_fecha_creacion) ?></td>
                    <td><?= h($tComponente->com_eliminado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $tComponente->id_componente]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tComponente->id_componente]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tComponente->id_componente], ['confirm' => __('¿Eliminar componente {0}?', $tComponente->com_nombre)]) ?>
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
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')) ?></p>
    </div>
</div>
