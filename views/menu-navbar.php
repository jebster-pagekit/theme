<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <?php foreach ($root->getChildren() as $node) :
            if(sizeof($node->getChildren()) > 0): ?>
                <li class="dropdown <?= $node->get('active') ? 'active' : '' ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= $node->title ?>
                         <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach($node->getChildren() as $child): ?>
                            <li class="<?= $child->get('active') ? 'active' : '' ?>">
                                <a href="<?= $child->getUrl() ?>">
                                    <?= $child->title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php else: ?>
                <li class="<?= $node->get('active') ? 'active' : '' ?>">
                    <a href="<?= $node->getUrl() ?>">
                        <?= $node->title ?>
                    </a>
                </li>
            <?php endif;
        endforeach ?>
    </ul>
</div>

