<div class="row">
	<h1>Posts in relation with <?= $category->name ?></h1>
		<?php $file = WWW_ROOT . 'img' . DS . 'icons' . DS . strtolower($category->name).'.svg';?>
		<?php $sclass = "cat-icon-mask cat-color" . (string)($category->id-1)%4 ?>
		<?php $caticon = 'icons/'.strtolower($category->name).'.svg'?>
		<?php if(file_exists($file) == false): ?>
			<?php $caticon = 'icons/unknown.svg'?>
		<?php endif; ?>
	<div class="small-12 columns small-centered">
		<?php foreach($posts as $post): ?>
		<article class="post">
			<div class="post-cat">
				<p class="post-cat-image"><?php echo $this->Html->image($caticon, array('class' => 'post-cat-image-resize')) ?></p>
				<p class="post-cat-text"> <?= $category->name ?></p>
			</div>

			<div class="post-desc">
				<h4 class="post-desc-header"><?= $post->title ?></h4>
				<p class="post-desc-detail"><?= $post->body ?></p>
				<a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id], true); ?>" class="detail button">Read post</a>
			</div>
		</article>
		<hr>
        <?php endforeach; ?>
	</div>
</div>
