<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TCiudad $tCiudades
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 'Cities', 'action' => 'index']],
        ['title' => "Ciudad: $tCiudades->ciu_nombre",'url' => '#']
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
                ['action' => 'delete', $tCiudades->id_ciudad],
                ['confirm' => __('¿Eliminar ciudad de {0}?, se eliminarán las tiendas asociadas a este registro.', $tCiudades->ciu_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tCiudades form content">
            <?= $this->Form->create($tCiudades) ?>
            <fieldset>
                <legend><?= __('Editar Ciudad') ?></legend>
                <?php
                    echo $this->Form->control('ciu_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('ciu_estado',['type'=>'checkbox','label'=>'Activa']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
