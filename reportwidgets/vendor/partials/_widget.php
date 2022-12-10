<div class="report-widget">
    <h3>Packagist - <?= $this->property('vendor') ?></h3>

    <img
        src="<?= Url::asset('plugins/webvpf/packagist/assets/img/placeholder.svg') ?>"
        class="placeholder"
        style="width: 100%; height: 227px"
        onload="$.request('<?= $this->alias ?>::onLoad');"
    />
</div>
