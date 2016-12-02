<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h4 class="text-center"> Register an organization </h4>
            <?php echo $this->Form->input('camp_id', ['required' => false, 'type' => 'select', 'options' => $camps, 'label' => 'Which camp this organization will be linked to']); ?>
            <div class="text-right"> Your camp is not on the list ?</div>
        <?php
            echo $this->Html->link('Please, take one moment to register it.', ['controller' => 'Camps', 'action' => 'add'], ['id' => 'campLink']);
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname', ['required'=>false]);
            echo $this->Form->input('name');
            echo $this->Form->input('email', ['required'=>false]);
            echo $this->Form->input('phone', ['required'=>false]);
            echo $this->Form->input('description', ['required'=>false]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
