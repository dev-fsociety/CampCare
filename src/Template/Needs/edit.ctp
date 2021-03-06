<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $need->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $need->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Needs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="needs form large-9 medium-8 columns content">
    <?= $this->Form->create($need) ?>
    <fieldset>
        <legend><?= __('Edit Need') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('item_id', ['options' => $items]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
