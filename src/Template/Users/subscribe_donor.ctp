<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h4 class="text-center"> Register as donor </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname');
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('description', ['required'=>false]);
        ?>
    </fieldset>
    <a type="submit" class="button expanded">
      <?= $this->Form->button(__('Submit')) ?>
    </a>
    <?= $this->Form->end() ?>
</div>