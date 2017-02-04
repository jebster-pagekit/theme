<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <?php foreach ($root->getChildren() as $node) : ?>
            <li class="<?= $node->get('active') ? 'active' : '' ?>">
                <a href="<?= $node->getUrl() ?>">
                    <?= $node->title ?>
                </a>
            </li>
        <?php endforeach ?>
<!--        <li class="dropdown">-->
<!--            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--            <ul class="dropdown-menu">-->
<!--                <li><a href="#">Action</a></li>-->
<!--                <li><a href="#">Another action</a></li>-->
<!--                <li><a href="#">Something else here</a></li>-->
<!--                <li role="separator" class="divider"></li>-->
<!--                <li class="dropdown-header">Nav header</li>-->
<!--                <li><a href="#">Separated link</a></li>-->
<!--                <li><a href="#">One more separated link</a></li>-->
<!--            </ul>-->
<!--        </li>-->
    </ul>
</div><!--/.nav-collapse -->