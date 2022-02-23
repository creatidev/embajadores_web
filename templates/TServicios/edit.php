<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TServicio $tServicio
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Servicios','url' => ['controller' => 'Services', 'action' => 'index']],
        ['title' => 'Servicio: '.$tServicio->ser_nombre,'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates([
        'wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $tServicio->id_servicio],
                ['confirm' => __('¿Eliminar servicio {0}?', $tServicio->ser_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Servicios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tServicios form content">
            <?= $this->Form->create($tServicio) ?>
            <fieldset>
                <legend><?= __('Editar Servicio') ?></legend>
                <?php
                    echo $this->Form->control('ser_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('ser_estado',['label'=>'Activo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
