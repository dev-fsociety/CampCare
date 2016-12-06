<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
    </ul>
</nav>

<div class="items form large-centered large-4 medium-3 medium-centered columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <h4><?= __('Edit Category') ?></h4>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true]);
            //echo $this->Form->input('camp_id', ['options' => $camps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
