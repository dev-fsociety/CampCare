<div class="row small-up-2 medium-up-3 large-up-4">
<?php $counter = 0;?>
<?php foreach ($categories as $category): ?>
	<!-- if right camp -->
	<?php $sclass = "square square-color" . (string)($counter%4) ?>
	<div class="column text-center square-container"><a class="<?php echo $sclass; ?>" href="#"><div class="square-content"><?= h($category->name) ?></div></a></div>
	<?php $counter++;?>
<?php endforeach; ?>
</div>