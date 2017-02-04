<?php foreach ($widgets as $widget) : ?>
    <div style="margin: 0; padding: 0;">
        <?= $widget->get('result') ?>
    </div>
<?php endforeach ?>