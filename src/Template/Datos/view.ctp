<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dato $dato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dato'), ['action' => 'edit', $dato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dato'), ['action' => 'delete', $dato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Datos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="datos view large-9 medium-8 columns content">
    <h3><?= h($dato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $dato->has('user') ? $this->Html->link($dato->user->name, ['controller' => 'Users', 'action' => 'view', $dato->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dato->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($dato->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($dato->fecha) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($dato->data)); ?>
    </div>
</div>
