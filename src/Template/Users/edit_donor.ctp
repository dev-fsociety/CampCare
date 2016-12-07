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
         <h4 class="text-center"> Edit your profile (donor) </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname');
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('description', ['required' => false]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button expanded']) ?>
    <?= $this->Form->end() ?>
</div>


