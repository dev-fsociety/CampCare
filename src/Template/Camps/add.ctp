<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Camps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="camps form large-9 medium-8 columns content">
    <?= $this->Form->create($camp) ?>
    <fieldset>
        <legend><?= __('Add Camp') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('lng');
            echo $this->Form->input('lat');
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
