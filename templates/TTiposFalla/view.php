<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTiposFalla $tTiposFalla
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit T Tipos Falla'), ['action' => 'edit', $tTiposFalla->id_tipo_falla], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete T Tipos Falla'), ['action' => 'delete', $tTiposFalla->id_tipo_falla], ['confirm' => __('Are you sure you want to delete # {0}?', $tTiposFalla->id_tipo_falla), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List T Tipos Falla'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New T Tipos Falla'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tTiposFalla view content">
            <h3><?= h($tTiposFalla->id_tipo_falla) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tpf Nombre') ?></th>
                    <td><?= h($tTiposFalla->tpf_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Tipo Falla') ?></th>
                    <td><?= $this->Number->format($tTiposFalla->id_tipo_falla) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tpf Fecha Creacion') ?></th>
                    <td><?= h($tTiposFalla->tpf_fecha_creacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tpf Estado') ?></th>
                    <td><?= $tTiposFalla->tpf_estado ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Tpf Eliminado') ?></th>
                    <td><?= $tTiposFalla->tpf_eliminado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
