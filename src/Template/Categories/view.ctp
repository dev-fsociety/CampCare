<?php //debug($category); die(); ?>
<h1 class="text-center">Help on getting <?= $category->name ?> in <?= $category->has('camp') ? $this->Html->link($category->camp->name, ['controller' => 'Camps', 'action' => 'view', $category->camp->id]) : '' ?></h1>

    <div class="related">
        <?php if (!empty($category->categories->toArray())): ?>
        <h4>Sub-categories</h4>
		<div class="row small-up-2 medium-up-3 large-up-4">


		<?php foreach ($category->categories as $category): ?>
			<?php $sclass = "cat-icon-mask cat-color" . (string)($category->id-1)%4 ?>

			<div class="column text-center">
				<a class="cat-container" href=<?php echo "" . (string)$category->id; ?>>
						<?php echo $this->Html->image('icons/food.svg', array('class' => $sclass)) ?>
						<h4 class="cat-text"><?= $category->name ?></h4>
				</a>
			</div>
		<?php endforeach; ?>
		</div>
        <?php endif; ?>
    </div>
    <div class="related">
		<!-- Liste d'items -->
        <?php if ($category->items != null): ?>
		<h4><?= __('Related Items') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Hot') ?></th>
                <th scope="col"><?= __('Cooldown') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->category_id) ?></td>
                <td><?= h($items->description) ?></td>
                <td><?= h($items->hot) ?></td>
                <td><?= h($items->cooldown) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($category->posts)): ?>
		<h4><?= __('Related Posts') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
