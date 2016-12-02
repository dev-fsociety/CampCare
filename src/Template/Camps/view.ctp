<div class="row">

    <div class="large-9 columns">

        <h2> <?= h($camp->name) ?> </h2>

        <hr>

        <p>Nombre de réfugiés : <?= $refugee_count ?></p>

        <p>Localisation : lng : <?= $this->Number->format($camp->lng) ?>, lat : <?= $this->Number->format($camp->lat) ?></p>

    </div>
    <div class="large-3 columns">

    <?= $this->Html->link(__('Edit Camp'), ['action' => 'edit', $camp->id], array('class' => 'button expanded')) ?>

    </div>

    <br>

    <div class="large-9 columns">
        <h4> Categories for this camp </h4>
        <ul>
            <?php foreach($camp->categories as $category): ?>
                <li> <?= h($category->name) ?> <?= $this->Form->postLink(__('<i class="fi-x-circle"></i>'), ['controller' => 'Categories', 'action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete : {0}?', $category->name), 'escape' => false]) ?></li>
            <?php endforeach; ?>
        </ul>

    </div>
    <div class="large-3 columns">

        <?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add'], array('class' => 'button expanded')) ?>
        <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], array('class' => 'button expanded')) ?>
    </div>
</div>
