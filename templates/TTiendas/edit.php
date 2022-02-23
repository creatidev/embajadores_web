<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTienda $tTienda
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 'tCiudades', 'action' => 'index']],
        ['title' => 'Tiendas','url' => ['controller' => 'tTiendas', 'action' => 'index']],
        ['title' => 'Editar Tienda','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates([
        'wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $tTienda->id_tienda],
                ['confirm' => __('¿Eliminar {0}?', $tTienda->tie_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Tiendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiendas form content">
            <?= $this->Form->create($tTienda) ?>
            <fieldset>
                <legend><?= __('Editar Tienda de la Ciudad: '.$tTienda->t_ciudade->ciu_nombre) ?></legend>
                <?php
                    echo $this->Form->control('tie_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('tie_estado',['label'=>'Activa']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
