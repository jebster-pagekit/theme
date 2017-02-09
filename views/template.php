<?php
use Pagekit\Application as App;

$module = App::module('theme');
$config = $module->config;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <?= $view->render('head') ?>

    <?php $view->style('bootstrap', 'theme:assets/css/bootstrap.min.css')?>
    <?php $view->style('theme', 'theme:assets/css/theme.css', 'bootstrap') ?>
    <?php $view->style('lato', '//fonts.googleapis.com/css?family=Lato') ?>


    <?php $view->script('bootstrap', 'theme:assets/js/bootstrap.min.js', ['jquery']) ?>
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

<?php if($view->position()->exists('above-full')) : ?>
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
            if($view->position()->exists('right-sidebar'))
                $size -= 3;
            if($view->position()->exists('left-sidebar'))
                $size -= 3;
        ?>
        <div class="row">
            <?php if($view->position()->exists('left-sidebar')) : ?>
                <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3">
                    <?= $view->position('left-sidebar') ?>
                </div>
            <?php endif; ?>


            <div class="col-xs-12 col-sm-12 col-md-<?=$size?> col-lg-<?=$size?>">
                <?= $view->render('content') ?>
            </div>

            <?php if($view->position()->exists('right-sidebar')) : ?>
                <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 ">
                    <?= $view->position('right-sidebar') ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if($view->position()->exists('under')) : ?>
            <?= $view->position('under', 'row-position.php') ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if($view->position()->exists('under-full')) : ?>
    <?= $view->position('under-full', 'full-position.php') ?>
<?php endif; ?>

<footer>
    <div class="container">
        <div style="text-align: center; height: 48px; line-height: 48px;">
            <?= $config['footer_title'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= $config['footer_address'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= $config['footer_phone'] ?>
            <img src="<?= $config['footer_logo'] ?>" style="float:right; height: 48px;">
        </div>
    </div>
</footer>


</body>
</html>