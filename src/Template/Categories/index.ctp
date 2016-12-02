<h1 class="text-center">Please select a category below</h1>
<div class="row small-up-2 medium-up-3 large-up-4">


<?php foreach ($categories as $category): ?>

	<?php $sclass = "cat-icon-mask cat-color" . (string)($category->id-1)%4 ?>

	<div class="column text-center">
		<?= $this->Html->link(
			$this->Html->image('icons/food.svg', array('class' => $sclass)).
			'<h4 class="cat-text">' . $category->name . '</h4>',			[
				'controller' => 'categories',
				'action' => 'view',
				$category->id
			],
			[
				'escape' => false,
				'class' => 'cat-container'
			]

		) ?>
	</div>
<?php endforeach; ?>
</div>
