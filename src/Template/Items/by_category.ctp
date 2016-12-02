
<h1 class="text-center" style="color: #444; margin-top: 2%; margin-bottom:2%;">Please select an item below</h1>

<div class="large-1 medium-1 columns"><br/></div>
<div class="columns small-up-12 medium-up-10 large-10">
<?php foreach ($items as $item): ?>
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
