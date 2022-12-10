<div class="report-widget">
    <h3>Packagist - <?= $this->property('vendor') ?></h3>

    <?php if (!isset($error)): ?>
        <div class="control-status-list packagist-vendor">
            <ul>
                <?php foreach ($vendor_list as $package): ?>
                    <?= $this->makePartial('package', ['package' => $package]) ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <p class="flash-message static warning"><?= e($error) ?></p>
    <?php endif ?>
</div>
