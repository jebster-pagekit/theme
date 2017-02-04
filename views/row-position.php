<?php foreach ($widgets as $widget) : ?>
    <div class="row">
        <div class="col-md-12">
            <?= $widget->get('result') ?>
        </div>
    </div>
<?php endforeach ?>