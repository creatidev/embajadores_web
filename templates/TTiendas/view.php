<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTienda $tTienda
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 'Cities', 'action' => 'index']],
        ['title' => 'Tiendas: '.$tTienda->t_ciudade->ciu_nombre,'url' => ['controller' => 'tCiudades', 'action' => 'view', $tTienda->t_ciudade->id_ciudad]],
        ['title' => 'Detalles','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $tTienda->id_tienda], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar...'), ['action' => 'delete', $tTienda->id_tienda], ['confirm' => __('Are you sure you want to delete # {0}?', $tTienda->id_tienda), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de tiendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva...'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiendas view content">
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($tTienda->id_tienda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tTienda->tie_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ciudad') ?></th>
                    <td><?= h($tTienda->t_ciudade->ciu_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creada') ?></th>
                    <td><?= h($tTienda->tie_fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('En Operacion') ?></th>
                    <td><?= $tTienda->tie_estado_operacion ? __('Si') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Activa') ?></th>
                    <td><?= $tTienda->tie_estado ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
