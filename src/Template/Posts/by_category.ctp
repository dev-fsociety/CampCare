

<div class="row">
	<h1>Posts in relation with <?= $category->name ?></h1>

	<div class="small-12 columns small-centered">
		<?php foreach($posts as $post): ?>
		<article class="post">
			<div class="post-cat">
				<p class="post-cat-image"><?php echo $this->Html->image('icons/food.svg', array('class' => 'post-cat-image-resize')) ?></p>
				<p class="post-cat-text">Food</p>
			</div>

			<div class="post-desc">
				<h4 class="post-desc-header"><?= $post->title ?></h4>
				<p class="post-desc-detail"><?= $post->body ?></p>
				<a href="#" class="detail button">Read post</a>
			</div>
		</article>
		<hr>
        <?php endforeach; ?>
	</div>
</div>
