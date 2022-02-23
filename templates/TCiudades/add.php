<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TCiudad $tCiudades
 */
?>
<?php
    $this->Breadcrumbs->add([
        ['title' => 'Inicio','url' => ['controller' => 'Pages', 'action' => 'home']],
        ['title' => 'Ciudades','url' => ['controller' => 't_ciudades', 'action' => 'index']],
        ['title' => "Registrar ciudad",'url' => '#']
    ]);
    $this->Breadcrumbs->setTemplates(['wrapper' => '<nav id="breadcrumb">{{content}}</nav>']);
    echo $this->Breadcrumbs->render();
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Lista de Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tCiudades form content">
            <?= $this->Form->create($tCiudades) ?>
            <fieldset>
                <legend><?= __('Registrar Ciudad') ?></legend>
                <?php
                    echo $this->Form->control('ciu_nombre',['label'=>'Nombre']);
                    echo $this->Form->control('ciu_estado',['label'=>'Activa']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
