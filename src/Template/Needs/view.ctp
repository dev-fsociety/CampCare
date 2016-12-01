<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Need'), ['action' => 'edit', $need->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Need'), ['action' => 'delete', $need->id], ['confirm' => __('Are you sure you want to delete # {0}?', $need->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Needs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Need'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="needs view large-9 medium-8 columns content">
    <h3><?= h($need->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $need->has('user') ? $this->Html->link($need->user->name, ['controller' => 'Users', 'action' => 'view', $need->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $need->has('item') ? $this->Html->link($need->item->name, ['controller' => 'Items', 'action' => 'view', $need->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($need->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($need->created) ?></td>
        </tr>
    </table>
</div>
