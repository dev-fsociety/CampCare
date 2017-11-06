<h1 class="text-center">Please select a category below</h1>
<div class="row small-up-2 medium-up-3 large-up-4">

<?php foreach ($categories as $category): ?>
	<?php $file = WWW_ROOT . 'img' . DS . 'icons' . DS . strtolower($category->name).'.svg';?>
	<?php $sclass = "cat-icon-mask cat-color" . (string)($category->id-1)%4 ?>
	<?php $caticon = 'icons/'.strtolower($category->name).'.svg'?>
	<?php if (file_exists($file)==false): ?>
		<?php $caticon = 'icons/unknown.svg'?>
	<?php endif; ?>
	<div class="column text-center">
		<?= $this->Html->link(
			$this->Html->image($caticon, array('class' => $sclass)).
			'<h4 class="cat-text">' . $category->name . '</h4>', [
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
