<div class="row">
  <div class="medium-6 medium-centered large-4 large-centered columns">
    
    <!-- Log In section --> 
    <div class="row column log-in-form"  style="padding:1rem; margin-bottom: 10px; margin-top: 10px;">
      <?= $this->Form->create() ?>
      <fieldset>
      <h4 class="text-center"> Log In </h4>
      <?php 
          echo $this->Form->input('username');
          echo $this->Form->input('password');
      ?>
      <p>
        <a type="submit" class="button expanded">
          <?= $this->Form->button(__('Log In')) ?>
        </a>
      </p>
      <?= $this->Form->end() ?>
      <p class="text-center"><a href="#"></a></p>   
    </div>

    <!-- Sign Up section --> 
    <div class="row column log-in-form">
      <h4 class="text-center">Sign up as</h4> 
      <center>
        <div class="button-group-unstack">
          <?= $this->Html->link(__('Refugee'), ['controller' => 'Users', 'action' => 'subscribeRefugee'], ['class' => 'button']) ?>
          <?= $this->Html->link(__('Donor'), ['controller' => 'Users', 'action' => 'subscribeDonor'], ['class' => 'button']) ?>
        </div>
      </center>
  </div>
  </div>
</div>
