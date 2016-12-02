<?php //debug($category); die(); ?>
<h1 class="text-center">Help on getting <?= $category->name ?> in <?= $category->has('camp') ? $this->Html->link($category->camp->name, ['controller' => 'Camps', 'action' => 'view', $category->camp->id]) : '' ?></h1>

    <div class="related">
        <?php if (!empty($category->categories->toArray())): ?>
		<h3 class="text-center" style="color: #444; margin-top: 2%; margin-bottom:2%;">Please select a sub-category below</h1>
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
        <?php if ($category->items != null): ?>

		<h3 class="text-center" style="color: #444; margin-top: 2%; margin-bottom:2%;">Please select an item below</h1>

		<div class="large-1 medium-1 columns"><br/></div>
		<div class="columns small-up-12 medium-up-10 large-10">
            <?php foreach ($category->items as $item): ?>
				<?php $sclass = "cat-icon-mask cat-color" . (string)($item->id-1)%4 ?>
				<?=$this->Html->link('
				 	<div class="row item">
						<div class="column large-2 medium-2 small-2 text-center">
							<div class="cat-container" >
									' . $this->Html->image("icons/food.svg", array("class" => $sclass)) . '
							</div>
						</div>
						<div class="column large-10 medium-10 small-10">
							<h4 class="item-title">'.$item->name.'</h4>
							<p class="item-desc">
								'.$this->Text->autoParagraph(h($item->description)).'
							</p>
						 </div>
					</div>',
					[
						'controller' => 'items',
						'action' => 'process',
						    $item->id
					],
					[
						'escape' => false
					]);
				?>
		<?php endforeach; ?>
		</div>
		<div class="large-1 medium-1 columns"><br/></div>
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
