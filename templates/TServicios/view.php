<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TServicio $tServicio
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Servicios','url' => ['controller' => 't_servicios', 'action' => 'index']],
        ['title' => 'Servicio: '.$tServicio->ser_nombre,'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $tServicio->id_servicio], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar...'), ['action' => 'delete', $tServicio->id_servicio], ['confirm' => __('Are you sure you want to delete # {0}?', $tServicio->id_servicio), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Servicios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo...'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tServicios view content">
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($tServicio->id_servicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tServicio->ser_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($tServicio->ser_fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activo') ?></th>
                    <td><?= $tServicio->ser_estado ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="table-responsive view content">
            <?= $this->Html->link(__('Asociar Componente'), ['controller'=>'tComponentes','action' => 'add', $tServicio->id_servicio], ['class' => 'button float-right']) ?>
            <h3><?= __('Componentes asociados') ?></h3>
            <table>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_componente','ID') ?></th>
                    <th><?= $this->Paginator->sort('com_nombre','Nombre') ?></th>
                    <th><?= $this->Paginator->sort('com_estado','Activo') ?></th>
                    <th><?= $this->Paginator->sort('com_fecha_creacion','Creado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $tComponentes = $tServicio->t_componentes; ?>
                <?php foreach ($tComponentes as $tComponente): ?>
                    <tr>
                        <td><?= $this->Number->format($tComponente->id_componente) ?></td>
                        <td><?= h($tComponente->com_nombre) ?></td>
                        <td><?= $tComponente->com_estado ? __('Si') : __('No') ?></td>
                        <td><?= h($tComponente->com_fecha_creacion) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['controller'=>'t_componentes','action' => 'view', $tComponente->id_componente]) ?>
                            <?= $this->Html->link(__('Editar'), ['controller'=>'t_componentes','action' => 'edit', $tComponente->id_componente]) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tComponente->id_componente], ['confirm' => __('¿Eliminar el componente {0}?', $tComponente->com_nombre)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
