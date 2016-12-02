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
<div class="items form large-centered large-4 medium-3 medium-centered columns content">
    <?= $this->Form->create($camp) ?>
    <fieldset>
        <h4><?= __('Edit Camp') ?></h4>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('lng');
            echo $this->Form->input('lat');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => ' button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
