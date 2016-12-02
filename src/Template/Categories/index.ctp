<h1 class="text-center">Please select a category below</h1>
<div class="row small-up-2 medium-up-3 large-up-4">
<?php foreach ($categories as $category): ?>
	<!-- if right camp -->
	<?php $sclass = "square square-color" . (string)($category->id-1)%4 ?>
	<div class="column text-center square-container">

		<?=
			 $this->Html->link(
				'	<div class="square-content"> '.
				h($category->name).
				'</div>'
				,
			        [
			            'controller' => 'categories',
			            'action' => 'view',
									$category->id
			        ],
							[
								'escape' => false,
								'class' => $sclass
							]
			    );
		?>

	</div>
<?php endforeach; ?>
</div>
