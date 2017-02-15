<?php
$view->style('blog-post', 'theme:assets/css/blog.css');
$view->script('post', 'theme:assets/js/blogPost.js', 'vue');
?>

<article id="post" class="blog" v-cloak>

    <h1 class="page-header"><?= $post->title ?></h1>


    <div class="uk-margin"><?= $post->content ?></div>

    <?php // TODO: Add support for facebook comments. ?>

</article>
