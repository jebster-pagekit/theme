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

    <?php $view->style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')?>
    <?php $view->style('theme', 'theme:assets/css/theme.css', 'bootstrap') ?>
    <?php $view->style('lato', '//fonts.googleapis.com/css?family=Lato') ?>

    <?php $view->script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 'jquery') ?>
</head>
<body>

<header class="navbar-fixed-top">
    <nav class="navbar navbar-default container">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?= $view->url()->get() ?>">
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
</header>

<div class="first"></div>

<?php if($view->position()->exists('above-full')) : ?>
    <?= $view->position('above-full', 'full-position.php') ?>
<?php endif; ?>

<div class="container">

    <?php if($view->position()->exists('above')) : ?>
        <?= $view->position('above', 'row-position.php') ?>
    <?php endif; ?>

    <div class="row ">
        <?php if($view->position()->exists('sidebar')) : ?>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <?php else : ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php endif; ?>
        <?= $view->render('content') ?>
        </div>

        <?php if($view->position()->exists('sidebar')) : ?>
            <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 ">
                <?= $view->position('sidebar') ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if($view->position()->exists('under')) : ?>
        <?= $view->position('under', 'row-position.php') ?>
    <?php endif; ?>
</div>

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