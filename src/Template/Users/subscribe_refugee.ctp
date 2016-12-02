<style type="text/css">

  body {
    background: url(../img/login_bg.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

</style>

<div class="log-in-form medium-6 medium-centered large-4 large-centered columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h4 class="text-center"> Register as refugee </h4>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname', ['type' => 'hidden']);
            echo $this->Form->input('name', ['type' => 'hidden']);
            echo $this->Form->input('email', ['type' => 'hidden']);
            echo $this->Form->input('phone', ['type' => 'hidden']);
            echo $this->Form->input('description', ['type' => 'hidden']);
            echo $this->Form->input('camp_id', ['options' => $camps]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
