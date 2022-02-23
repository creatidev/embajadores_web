<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TComponente $tComponente
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Servicios','url' => ['controller' => 'tServicios', 'action' => 'index']],
        ['title' => 'Componentes','url' => ['controller' => 'tComponentes', 'action' => 'index']],
        ['title' => 'Componente: '.$tComponente->com_nombre,'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar...'), ['action' => 'edit', $tComponente->id_componente], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tComponente->id_componente], ['confirm' => __('¿Eliminar componente {0}?', $tComponente->com_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Componentes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo...'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tComponentes view content">
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($tComponente->id_componente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($tComponente->com_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Servicio') ?></th>
                    <td><?= h($tComponente->t_servicio->ser_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($tComponente->com_fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Activo') ?></th>
                    <td><?= $tComponente->com_estado ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
