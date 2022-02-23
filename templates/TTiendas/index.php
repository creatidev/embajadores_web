<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTienda[]|\Cake\Collection\CollectionInterface $tTiendas
 * @var $count
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 't_ciudades', 'action' => 'index']],
        ['title' => 'Tiendas','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Ciudades registradas'), ['controller'=>'t_ciudades','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiendas index content">
            <?= $this->Html->link(__('Nueva Tienda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
            <h3><?= __("Tiendas registradas: $count") ?></h3>
            <?= $this->Form->create(null,['type'=>'get']) ?>
            <?= $this->Form->control('key',['label'=>'Buscar']) ?>
            <?= $this->Form->submit('Consultar') ?>
            <?= $this->Form->end() ?>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_tienda','ID') ?></th>
                        <th><?= $this->Paginator->sort('id_ciudad','Ciudad') ?></th>
                        <th><?= $this->Paginator->sort('tie_nombre','Tienda') ?></th>
                        <th><?= $this->Paginator->sort('tie_estado_operacion','En operación') ?></th>
                        <th><?= $this->Paginator->sort('tie_estado','Activa') ?></th>
                        <th><?= $this->Paginator->sort('tie_fecha_creacion','Creada') ?></th>
                        <th class="actions"><?= __('Acciones') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tTiendas as $tTienda): ?>
                        <tr>
                            <td><?= $this->Number->format($tTienda->id_tienda) ?></td>
                            <td><?= h($tTienda->t_ciudade->ciu_nombre) ?></td>
                            <td><?= h($tTienda->tie_nombre) ?></td>
                            <td><?= $tTienda->tie_estado_operacion ? __('Si') : __('No') ?></td>
                            <td><?= $tTienda->tie_estado ? __('Si') : __('No') ?></td>
                            <td><?= h($tTienda->tie_fecha_creacion) ?></td>
                            <td><?= h($tTienda->tie_eliminado) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $tTienda->id_tienda]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tTienda->id_tienda]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tTienda->id_tienda], ['confirm' => __('¿Eliminar {0}?', $tTienda->tie_nombre)]) ?>
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
