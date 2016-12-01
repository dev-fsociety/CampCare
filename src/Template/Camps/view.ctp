<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Camp'), ['action' => 'edit', $camp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Camp'), ['action' => 'delete', $camp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $camp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Camps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Camp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="camps view large-9 medium-8 columns content">
    <h3><?= h($camp->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($camp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($camp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($camp->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($camp->lat) ?></td>
        </tr>
    </table>
</div>
 -->

<br> 
<div class="row">
    
    <div class="large-9 columns">

        <h2> <?= h($camp->name) ?> </h2>

        <hr>

        <p>Nombre de migrants : 10</p>

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

                <li> <?= h($category->name) ?></li>

            <?php endforeach; ?>

        </ul>


    </div>
    <div class="large-3 columns">
        
        <?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add'], array('class' => 'button expanded')) ?>

    </div>


</div>

