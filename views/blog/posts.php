<?php $view->script('posts', 'theme:js/blogPosts.js', 'vue') ?>
<br>
<style>
    .card{
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
        margin: 25px 0;
    }
    .card-image{
        float: left;
        margin: 10px;
    }
    .card-image img{
        width: 200px;
    }
    .card-title{
        color: #BA0000;
        font-weight: bold;
    }
    .card-content{
        padding: 15px 5px;
    }
</style>
<div id="posts">
    <?php foreach ($posts as $post) : ?>
        <div class="card">
            <div class="card-image">
                <?php if ($image = $post->get('image.src')): ?>
                    <a href="<?= $view->url('@blog/id', ['id' => $post->id])?>">
                        <img class="card-img-top" src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
                    </a>
                <?php endif; ?>
            </div>
            <div class="card-content">
                <a href="<?= $view->url('@blog/id', ['id' => $post->id])?>">
                    <h4 class="card-title"><?= $post->title ?></h4>
                </a>
                <p class="card-text">
                    <?= $post->excerpt ?:
                        (strlen(strip_tags($post->content,'<br><a>')) > 13)
                            ? substr(strip_tags($post->content,'<br><a>'),0,1000).'...'
                            : strip_tags($post->content,'<br><a>') ?>
                </p>
                <a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>" class="btn btn-red">
                    {{ 'Read more' | trans }}
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>

