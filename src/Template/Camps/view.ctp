<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Camp'), ['action' => 'edit', $camp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Camp'), ['action' => 'delete', $camp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $camp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Camps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Camp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="camps view large-9 medium-8 columns content">
    <h3><?= h($camp->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($camp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($camp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($camp->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($camp->lat) ?></td>
        </tr>
    </table>
</div>
