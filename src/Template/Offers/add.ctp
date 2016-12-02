<div class="large-2 medium-3 columns" id="blank"><br></div>
<div class="form large-8 medium-6 columns content" style="margin-top:5%;">
    <?= $this->Form->create($offer) ?>
    <fieldset>
        <legend><?= __('Add Offer') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['type' => 'hidden']);
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('event_date');
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="large-2 medium-3 columns" id="blank"><br></div>
