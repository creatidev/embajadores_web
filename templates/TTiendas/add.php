<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTienda $tTienda
 * @var $ciudades
 * @var $cityId
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 't_ciudades', 'action' => 'index']],
        ['title' => 'Tiendas','url' => ['controller' => 't_tiendas', 'action' => 'index']],
        ['title' => 'Registro','url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de Tiendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiendas form content">
            <?php
            $formattedCities = [];
            foreach ($ciudades as $row) {
                $formattedCities[$row['id_ciudad']] = $row['ciu_nombre'];
            }
            $ciudades = $formattedCities;
            ?>
            <?= $this->Form->create($tTienda) ?>
            <fieldset>
                <legend><?= $cityId != null ? __('ASOCIAR NUEVA TIENDA') : __('REGISTRAR NUEVA TIENDA') ?></legend>
                <?php
                    echo $this->Form->control('id_ciudad',['type'=>'select','label'=>'Ciudad','options'=>$ciudades,'default'=>$cityId]);
                    echo $this->Form->control('tie_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('tie_estado',['label'=>'Activa']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
