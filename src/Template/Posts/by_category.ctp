<div class="row">
    <h5>Posts in relation with <?= $category->name ?></h5>
    <ul>
        <?php foreach($posts as $post): ?>
            <li>
                <h6><?= $post->title ?></h6>
                <p><?= $post->body ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
