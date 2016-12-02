<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
         <h4 class="text-center"> Edit your profile (refugee) </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname', ['required'=>false]);
            echo $this->Form->input('name', ['required'=>false]);
            echo $this->Form->input('email', ['required'=>false]);
            echo $this->Form->input('phone', ['required'=>false]);
            echo $this->Form->input('description', ['required'=>false]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
