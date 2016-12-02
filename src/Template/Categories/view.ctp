<?php //debug($category); die(); ?>
<h1 class="text-center">Help on getting <?= $category->name ?> in <?= $category->has('camp') ? $category->camp->name : 'your area' ?></h1>

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

		<div class="row">
			<div class="column large-4 medium-3 small-1 text-center"><br/></div>
			<div class="column large-4 medium-6 small-10 text-center">
				<?=$this->Html->link('
				 	<div class="row">
						<div class="column large-2 medium-2 small-2 text-center">
									' . $this->Html->image("icons/posts.svg", array("style" => "width: 2em; height: 2em;")) . '
						</div>
						<div class="column large-10 medium-10 small-10 text-center">
								&nbsp; Read the '.count($category->posts).' posts concerning this topic
						</div>
					</div>',
					[
						'controller' => 'Posts',
						'action' => 'by_category',
						    $category->id
					],
					[
						'escape' => false,
						'class' => "button posts-button"
					]);
				?>
			</div>
			<div class="column large-4 medium-3 small-1 text-center"><br/></div>
		</div>
        <?php endif; ?>
    </div>

	<div class="row"> <br/> </div>
