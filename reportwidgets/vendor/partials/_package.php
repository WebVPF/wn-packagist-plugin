<li>
    <div>
        <?= explode('/', $package['name'])[1] ?>

        <i class="icon-circle-info icon-lg"
            data-toggle="tooltip"
            data-placement="top"
            data-delay="100"
            title="<?= $package['description'] ?>"
        ></i>

        <a class="icon-external-link"
            href="https://packagist.org/packages/<?= $package['name'] ?>"
            target="_blank"
            rel="noopener noreferrer"
        ></a>

        <a class="icon-brands icon-github"
            href="<?= $package['repository'] ?>"
            target="_blank"
            rel="noopener noreferrer"
        ></a>
    </div>
    <div>
        <i class="icon-circle lang-<?= $package['language'] ?>"></i> <?= $package['language'] ?>
        <i class="icon-circle-down"></i> <?= $package['downloads']['total'] ?>
        <i class="icon-star"></i> <?= $package['github_stars'] ?>
        <i class="icon-code-fork"></i> <?= $package['github_forks'] ?>
        <i class="icon-circle-dot"></i> <?= $package['github_open_issues'] ?>
    </div>
</li>
