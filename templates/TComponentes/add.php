<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TComponente $tComponente
 * @var $servicios
 * @var $serviceId
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
            <?= $this->Html->link(__('Lista de Componentes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tComponentes form content">
            <?php
            $formattedServices = [];
            foreach ($servicios as $row) {
                $formattedServices[$row['id_servicio']] = $row['ser_nombre'];
            }
            $servicios = $formattedServices;
            ?>
            <?= $this->Form->create($tComponente) ?>
            <fieldset>
                <legend><?= $serviceId != null ? __('ASOCIAR NUEVO COMPONENTE') : __('REGISTRAR NUEVO COMPONENTE') ?></legend>
                <?php
                    echo $this->Form->control('id_servicio',['type'=>'select','label'=>'Servicio','options'=>$servicios,'default'=>$serviceId]);
                    echo $this->Form->control('com_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('com_estado',['label'=>'Activo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
