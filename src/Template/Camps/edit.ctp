<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $camp->id],
                ['confirm' => __('Are you REALLY SURE you want to delete the camp # {0} ? Each content linked to it will be deleted as well...', $camp->name)]
            )
        ?></li>
    </ul>
</nav>
<div class="items form large-centered large-4 medium-3 medium-centered columns content">
    <?= $this->Form->create($camp) ?>
    <fieldset>
        <h4><?= __('Edit Camp') ?></h4>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('lng', ['type' => 'number']);
            echo $this->Form->input('lat', ['type' => 'number']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
