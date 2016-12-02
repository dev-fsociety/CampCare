<h1 class="text-center">Please select a category below</h1>
<div class="row small-up-2 medium-up-3 large-up-4">
<?php foreach ($categories as $category): ?>
	<!-- if right camp -->
	<?php $sclass = "square square-color" . (string)($category->id-1)%4 ?>
	<div class="column text-center square-container">
		<a class="<?php echo $sclass; ?>" href=<?php echo "Categories/view/" . (string)$category->id; ?>>
			<div class="square-content">
				<?= h($category->name) ?>
			</div>
		</a>
	</div>
<?php endforeach; ?>
</div>
