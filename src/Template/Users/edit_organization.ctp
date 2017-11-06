<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you REALLY SURE you want to delete the organization {0} ? Each users and content linked with it will be deleted as well...', $user->name)]
            )
        ?></li>
    </ul>
</nav>
<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
         <h4 class="text-center"> Edit your profile (organization) </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname',  ['required' => false, 'type' => 'hidden']);
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('description', ['required' => false]);
        ?>
    </fieldset>
      <?= $this->Form->button(__('Submit') , ['class' => 'button expanded'])?>
    <?= $this->Form->end() ?>
</div>
