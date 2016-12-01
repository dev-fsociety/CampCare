<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h4 class="text-center"> Register </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname', ['type' => 'hidden']);
            echo $this->Form->input('name', ['type' => 'hidden']);
            echo $this->Form->input('email', ['type' => 'hidden']);
            echo $this->Form->input('phone', ['type' => 'hidden']);
            echo $this->Form->input('description', ['type' => 'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
