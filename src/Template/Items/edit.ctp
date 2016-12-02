<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Needs'), ['controller' => 'Needs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Need'), ['controller' => 'Needs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offer'), ['controller' => 'Offers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('description');
            echo $this->Form->input('hot');
            echo $this->Form->input('cooldown');
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
