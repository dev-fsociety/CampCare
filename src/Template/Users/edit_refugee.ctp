<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
         <h4 class="text-center"> Edit your profile (refugee) </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname', ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('name', ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('email', ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('phone', ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('description', ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('camp_id', ['options' => $camps]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button'] , ['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>
