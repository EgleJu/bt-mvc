<ul class="uk-navbar-nav">
<?php foreach ($links as $lang => $link) : ?>
<li><a href="<?= $link; ?>"><?= $lang; ?></a></li>
<?php endforeach;?>
</ul>