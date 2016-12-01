<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">    
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h4 class="text-center"> Register an organisation </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
            echo $this->Form->input('firstname', ['required'=>false]);
            echo $this->Form->input('name');
            echo $this->Form->input('email', ['required'=>false]);
            echo $this->Form->input('phone', ['required'=>false]);
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <a type="submit" class="button expanded">
      <?= $this->Form->button(__('Submit')) ?>
    </a>
    <?= $this->Form->end() ?>
</div>