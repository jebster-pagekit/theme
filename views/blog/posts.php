<?php
$view->style('blog-post', 'theme:assets/css/blog.css');
$view->script('posts', 'theme:assets/js/blogPosts.js', 'vue');
$c = 0;
?>
<br>
<div id="posts" v-cloak>
    <div class="card-deck">
        <?php foreach ($posts as $post) : ?>
            <article class="card<?php if($c++ == 3){$c=0; echo ' p-3';}?>">
                <?php if ($image = $post->get('image.src')): ?>
                    <a href="<?= $view->url('@blog/id', ['id' => $post->id])?>">
                        <img class="card-img-top" src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>" style="height: 180px; width: 100%;display: block;">
                    </a>
                <?php endif; ?>
                <div class="card-block">
                    <a href="<?= $view->url('@blog/id', ['id' => $post->id])?>">
                        <h4 class="card-title"><?= $post->title ?></h4>
                    </a>
                    <p class="card-text">
                        <?php
                            if($post->excerpt && strlen($post->excerpt) > 0){
                                echo $post->excerpt;
                            }else if(strlen(strip_tags($post->content,'<br><a>')) > 13){
                                echo substr(strip_tags($post->content,'<br><a>'),0,1000).'...';
                            }else{
                                echo strip_tags($post->content,'<br><a>');
                            }
                        ?>
                    </p>
                </div>
                <div class="card-footer">

                    <a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>" class="btn btn-red pull-right">
                        {{ 'Read more' | trans }}
                    </a>
                </div>
            </article>
        <?php endforeach ?>
    </div>
</div>

