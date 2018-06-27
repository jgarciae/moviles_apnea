<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dato[]|\Cake\Collection\CollectionInterface $datos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dato'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="datos index large-9 medium-8 columns content">
    <h3><?= __('Datos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $dato): ?>
            <tr>
                <td><?= $this->Number->format($dato->id) ?></td>
                <td><?= h($dato->hora) ?></td>
                <td><?= h($dato->fecha) ?></td>
                <td><?= $dato->has('user') ? $this->Html->link($dato->user->name, ['controller' => 'Users', 'action' => 'view', $dato->user->id]) : '' ?></td>
                <td><?= h($dato->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dato->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dato->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dato->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
