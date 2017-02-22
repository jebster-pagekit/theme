<?php
use Pagekit\Application as App;

$module = App::module('theme');
$config = $module->config;


$displayPositions = true;
if($config['blog_frontpage']) {
// TODO: Do this some other way :P
    $test = App::db()->createQueryBuilder()
        ->select('*')
        ->from('@system_node')
        ->where('link = :link AND type = :type', ['link' => '@blog', 'type' => 'blog'])
        ->execute()->fetchAll();

    foreach (explode('/', $_SERVER["REQUEST_URI"]) as $p) {
        if ($p == $test[0]['slug']) $displayPositions = false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <?php if(isset($params['description']) && strlen(strip_tags($params['description'])) > 0): ?>
        <meta name="description" content="<?= strip_tags($params['description']) ?>" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= $view->render('head') ?>

    <?php $view->style('bootstrap', 'theme:assets/css/bootstrap.min.css')?>
    <?php $view->style('theme', 'theme:assets/css/theme.css', 'bootstrap') ?>
    <?php $view->style('header', 'theme:assets/css/header.css', 'bootstrap') ?>
    <?php $view->style('lato', '//fonts.googleapis.com/css?family=Lato') ?>

    <?php $view->script('bshover','theme:assets/js/bshover.min.js', 'jquery') ?>

    <?php $view->script('bootstrap', 'theme:assets/js/bootstrap.min.js', ['bshover']) ?>
    <script>
        $.fn.bootstrapDropdownHover({
            // see next for specifications
        });
    </script>
</head>
<body>

<header class="navbar-fixed-top">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-animations" aria-expanded="true">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $view->url()->get() ?>">
                        <?php if ($logo = $params['logo']) : ?>
                            <img class="logo" src="<?= $this->escape($logo) ?>" alt="">
                        <?php else : ?>
                            <?= $params['title'] ?>
                        <?php endif ?>
                    </a>
                </div>
                <?php if ($view->menu()->exists('main')) : ?>
                    <?= $view->menu('main', 'menu-navbar.php') ?>
                <?php endif ?>
            </div>
        </nav>
    </div>
</header>

<div class="first"></div>

<?php if($view->position()->exists('above-full') && $displayPositions) : ?>
    <?= $view->position('above-full', 'full-position.php') ?>
<?php endif; ?>

<?php if($params->get('full_width')):
    echo $view->render('content');
else: ?>
    <div class="container">
        <?php if($view->position()->exists('above')) : ?>
            <?= $view->position('above', 'row-position.php') ?>
        <?php endif; ?>
        <?php $size = 12;
            if($view->position()->exists('right-sidebar') && $displayPositions)
                $size -= 3;
            if($view->position()->exists('left-sidebar') && $displayPositions)
                $size -= 3;
        ?>
        <div class="row">
            <?php if($view->position()->exists('left-sidebar') && $displayPositions) : ?>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <?= $view->position('left-sidebar') ?>
                </div>
            <?php endif; ?>


            <div class="col-xs-12 col-sm-12 col-md-<?=$size?> col-lg-<?=$size?>">
                <?= $view->render('content') ?>
            </div>

            <?php if($view->position()->exists('right-sidebar') && $displayPositions) : ?>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                    <?= $view->position('right-sidebar') ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if($view->position()->exists('under')) : ?>
            <?= $view->position('under', 'row-position.php') ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($view->position()->exists('under-full') && $displayPositions) : ?>
    <?= $view->position('under-full', 'full-position.php') ?>
<?php endif; ?>

<footer>
    <div class="container text-center">
        <span>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $config['footer_title'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

        <span class="line">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $config['footer_address'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="line">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $config['footer_phone'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>


        <img src="<?= $config['footer_logo'] ?>" style="float:right; height: 48px;">
    </div>
</footer>


<?= $view->render('footer') ?>
</body>
</html>