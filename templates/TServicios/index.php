<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TServicio[]|\Cake\Collection\CollectionInterface $tServicios
 * @var $count
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Servicios','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Nuevo...'), ['action' => 'add','controller'=>'t_servicios'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Componentes'), ['action' => 'index','controller'=>'t_componentes'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tServicios index content">
            <?= $this->Html->link(__('Nuevo Servicio'), ['action' => 'add'], ['class' => 'button float-right']) ?>
            <?= $this->Form->create(null,['type'=>'get']) ?>
            <?= $this->Form->control('key',['label'=>'Buscar']) ?>
            <?= $this->Form->submit('Consultar') ?>
            <?= $this->Form->end() ?>
            <h3><?= __('Servicios registrados: '.$count) ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_servicio','ID') ?></th>
                        <th><?= $this->Paginator->sort('ser_nombre','Nombre') ?></th>
                        <th><?= $this->Paginator->sort('ser_estado','Activo') ?></th>
                        <th><?= $this->Paginator->sort('ser_fecha_creacion','Creado') ?></th>
                        <th class="actions"><?= __('Acciones') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tServicios as $tServicio): ?>
                        <tr>
                            <td><?= $this->Number->format($tServicio->id_servicio) ?></td>
                            <td><?= h($tServicio->ser_nombre) ?></td>
                            <td><?= $tServicio->ser_estado ? __('Si') : __('No') ?></td>
                            <td><?= h($tServicio->ser_fecha_creacion) ?></td>
                            <td><?= h($tServicio->ser_eliminado) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $tServicio->id_servicio]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tServicio->id_servicio]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tServicio->id_servicio], ['confirm' => __('¿Eliminar el servicio {0}?', $tServicio->ser_nombre)]) ?>
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
    </div>
</div>
