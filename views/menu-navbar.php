<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" aria-expanded="false">
    <ul class="nav navbar-nav">
        <?php foreach ($root->getChildren() as $node) :
            if(sizeof($node->getChildren()) > 0): ?>
                <li class="dropdown <?= $node->get('active') ? 'active' : '' ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?= $node->title ?>
                        <b class="caret hidden-md hidden-lg hidden-sm"></b>
                    </a>
                    <ul class="dropdown-menu dropdownhover-bottom" role="menu">
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

<script>
</script>
