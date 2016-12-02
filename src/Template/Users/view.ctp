<!-- user infos --> 
<div class="row" style="margin-top:40px;">  
  <div class="medium-6 columns">
    <div class="profile">
      <div class="content">
        <h4 class = "title">Account informations</h4>
            <ul>
                <li>username : <?= h($user->username) ?>
                <li>firstname : <?= h($user->firstname) ?>
                <li>name : <?= h($user->name) ?>
                <li>email : <?= h($user->email) ?>
                <li>description : <br> 
                    <?= $this->Text->autoParagraph(h($user->description)); ?>
            </ul>
         <?php echo $this->Html->link("Edit your profile", array('controller' => 'Users','action'=> 'editDonor', $user->id), array('class' => 'button expanded')) ?>
      </div>
    </div>
  </div>

<!-- offers --> 
  <div class="medium-6 columns end">
    <div class="profile">
      <div class="content">
        <h4 class = "title">Profile activities</h4>
        <div class="related">    
            <ul>
                <li><h5><?= __('Related Offers') ?></h5>
            </ul>    

            <?php if (!empty($user->offers)): ?>
            <div class="small-12 columns small-centered">
                <?php foreach($user->offers as $offers): ?>
                <article class="post">

                    <!-- date --> 
                    <div class="event-date">
                      <p class="event-month">Event date</p>
                      <p class="event-day"><?= h($offers->event_date) ?></p>
                    </div>

                    <div class="post-desc">
                        <h4 class="post-desc-header">Item N°<?= h($offers->item_id) ?></h4>
                        <p class="post-desc-detail">Creation date:<?= h($offers->created) ?></p>

                        <td class="actions" style="text-align:right;">
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                        </td>
                    </div>
                </article>
                <hr>
                <?php endforeach; ?>
            </div>
            <?php endif; ?> 

        </div>
        <?php echo $this->Html->link("Do an offer", array('controller' => 'Offers','action'=> 'add'), array('class' => 'button expanded'))?>
      </div>
    </div>
  </div>
</div>