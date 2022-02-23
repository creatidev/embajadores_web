<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TCiudad[]|\Cake\Collection\CollectionInterface $tCiudades
 * @var $count
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Tiendas asociadas'), ['action' => 'index','controller'=>'t_tiendas'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tCiudades index content">
            <?= $this->Html->link(__('Agregar Ciudad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
            <?= $this->Form->create(null,['type'=>'get']) ?>
            <?= $this->Form->control('key',['label'=>'Buscar']) ?>
            <?= $this->Form->submit('Consultar') ?>
            <?= $this->Form->end() ?>
            <h3><?= __("Ciudades registradas: $count") ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_ciudad','ID') ?></th>
                        <th><?= $this->Paginator->sort('ciu_nombre','Ciudad') ?></th>
                        <th><?= $this->Paginator->sort('ciu_estado','Activa') ?></th>
                        <th><?= $this->Paginator->sort('ciu_fecha_creacion','Creada') ?></th>
                        <th class="actions"><?= __('Acciones') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tCiudades as $tCiudad): ?>
                        <tr>
                            <td><?= $this->Number->format($tCiudad->id_ciudad) ?></td>
                            <td><?= h($tCiudad->ciu_nombre) ?></td>
                            <td><?= $tCiudad->ciu_estado ? __('Si') : __('No') ?></td>
                            <td><?= h($tCiudad->ciu_fecha_creacion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $tCiudad->id_ciudad]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tCiudad->id_ciudad]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tCiudad->id_ciudad], ['confirm' => __('¿Eliminar ciudad de {0}?, se eliminarán las tiendas asociadas a este registro.', $tCiudad->ciu_nombre)]) ?>
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
