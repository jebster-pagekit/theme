<article>
    <?php if (!$node->theme['title_hide']) : ?>
        <h1><?= $page->title ?></h1>
    <?php endif ?>

    <?= $page->content ?>
</article>
