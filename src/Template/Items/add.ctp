<div class="items form large-centered large-4 medium-3 medium-centered columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <h4 class="text-center"><?= __('Add Item') ?></h4>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('description');
            echo $this->Form->hidden('hot', ['value' => 0, 'type' => 'number']);
            echo $this->Form->input('cooldown');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
