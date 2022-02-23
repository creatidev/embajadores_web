<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TCiudad $tCiudad
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 't_ciudades', 'action' => 'index']],
        ['title' => "Ciudad: $tCiudad->ciu_nombre",'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $tCiudad->id_ciudad], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar...'), ['action' => 'delete', $tCiudad->id_ciudad], ['confirm' => __('¿Eliminar ciudad de {0}?, se eliminarán las tiendas asociadas a este registro.', $tCiudad->ciu_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de...'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva...'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tCiudades view content">
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($tCiudad->id_ciudad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tCiudad->ciu_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creada') ?></th>
                    <td><?= h($tCiudad->ciu_fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activa') ?></th>
                    <td><?= $tCiudad->ciu_estado ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="stores index content">
            <?= $this->Html->link(__('Asociar Tienda'), ['controller'=>'t_tiendas','action' => 'add', $tCiudad->id_ciudad], ['class' => 'button float-right']) ?>
            <h3><?= __('Tiendas asociadas: ') ?><?php echo(count($tCiudad->t_tiendas)); ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id_tienda','ID') ?></th>
                        <th><?= $this->Paginator->sort('tie_nombre','Nombre') ?></th>
                        <th><?= $this->Paginator->sort('tie_estado_operacion','En operación') ?></th>
                        <th><?= $this->Paginator->sort('tie_estado','Activa') ?></th>
                        <th><?= $this->Paginator->sort('tie_fecha_creacion','Creada') ?></th>
                        <th class="actions"><?= __('Acciones') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $tTiendas = $tCiudad->t_tiendas; ?>
                    <?php foreach ($tTiendas as $tTienda): ?>
                        <tr>
                            <td><?= $this->Number->format($tTienda->id_tienda) ?></td>
                            <td><?= h($tTienda->tie_nombre) ?></td>
                            <td><?= $tTienda->tie_estado_operacion ? __('Si') : __('No') ?></td>
                            <td><?= $tTienda->tie_estado ? __('Si') : __('No') ?></td>
                            <td><?= h($tTienda->tie_fecha_creacion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller'=>'t_tiendas','action' => 'view', $tTienda->id_tienda]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller'=>'t_tiendas','action' => 'edit', $tTienda->id_tienda]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tTienda->id_tienda], ['confirm' => __('¿Eliminar {0}?', $tTienda->tie_nombre)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
