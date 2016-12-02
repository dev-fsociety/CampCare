<div class="row" style="margin-top:40px;">  
  <div class="medium-6 columns">
    <div class="card">
      <div class="content">
        <h4>Account informations</h4>
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

  <div class="medium-6 columns end">
    <div class="card">
      <div class="content">

        <h4 style="text-align:center;">Profile activities</h4>
        <div class="related">
            <h6><?= __('Related Offers') ?></h6>
            <?php if (!empty($user->offers)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Item Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Event Date') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->offers as $offers): ?>
                <tr>
                    <td><?= h($offers->id) ?></td>
                    <td><?= h($offers->user_id) ?></td>
                    <td><?= h($offers->item_id) ?></td>
                    <td><?= h($offers->created) ?></td>
                    <td><?= h($offers->event_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
        <?php echo $this->Html->link("Do an offer", array('controller' => 'Offers','action'=> 'add'), array('class' => 'button expanded'))?>
      </div>
    </div>
  </div>
</div>