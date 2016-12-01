<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $camp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $camp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Camps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="camps form large-9 medium-8 columns content">
    <?= $this->Form->create($camp) ?>
    <fieldset>
        <legend><?= __('Edit Camp') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('lng');
            echo $this->Form->input('lat');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
