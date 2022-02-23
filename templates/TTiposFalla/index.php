<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TTiposFalla[]|\Cake\Collection\CollectionInterface $tTiposFalla
 */
?>
<div class="tTiposFalla index content">
    <?= $this->Html->link(__('New T Tipos Falla'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('T Tipos Falla') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_tipo_falla') ?></th>
                    <th><?= $this->Paginator->sort('tpf_nombre') ?></th>
                    <th><?= $this->Paginator->sort('tpf_estado') ?></th>
                    <th><?= $this->Paginator->sort('tpf_fecha_creacion') ?></th>
                    <th><?= $this->Paginator->sort('tpf_eliminado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tTiposFalla as $tTiposFalla): ?>
                <tr>
                    <td><?= $this->Number->format($tTiposFalla->id_tipo_falla) ?></td>
                    <td><?= h($tTiposFalla->tpf_nombre) ?></td>
                    <td><?= h($tTiposFalla->tpf_estado) ?></td>
                    <td><?= h($tTiposFalla->tpf_fecha_creacion) ?></td>
                    <td><?= h($tTiposFalla->tpf_eliminado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tTiposFalla->id_tipo_falla]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tTiposFalla->id_tipo_falla]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tTiposFalla->id_tipo_falla], ['confirm' => __('Are you sure you want to delete # {0}?', $tTiposFalla->id_tipo_falla)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
