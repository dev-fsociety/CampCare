<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
         <h4 class="text-center"> Edit your profile (organization) </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname',  ['required'=>false]);
            echo $this->Form->input('name');
            echo $this->Form->input('email', ['required'=>false]);
            echo $this->Form->input('phone', ['required'=>false]);
            echo $this->Form->input('description', ['required'=>false]);
        ?>
    </fieldset>
      <?= $this->Form->button(__('Submit') , ['class' => 'button expanded'])?>
    <?= $this->Form->end() ?>
</div>
