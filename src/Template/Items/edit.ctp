<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="items form large-centered large-4 medium-3 medium-centered columns content">
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
    <?= $this->Form->button(__('Submit'),['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
