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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $tComponente->id_componente],
                ['confirm' => __('¿Eliminar componente {0}?', $tComponente->com_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Componentes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tComponentes form content">
            <?= $this->Form->create($tComponente) ?>
            <fieldset>
                <legend><?= __('EDITAR COMPONENTE DE: '.$tComponente->t_servicio->ser_nombre) ?></legend>
                <?php
                    echo $this->Form->control('com_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('com_estado',['label'=>'Activo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
