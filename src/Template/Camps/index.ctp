<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= __('Actions') ?>
        <li><?= $this->Html->link(__('New Camp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="camps index large-9 medium-8 columns content">
    <h3><?= __('Camps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($camps as $camp): ?>
            <tr>
                <td><?= $this->Number->format($camp->id) ?></td>
                <td><?= h($camp->name) ?></td>
                <td><?= $this->Number->format($camp->lng) ?></td>
                <td><?= $this->Number->format($camp->lat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $camp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $camp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $camp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $camp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
