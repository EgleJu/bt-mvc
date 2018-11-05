<?php foreach ($messages as $message) :?>
<div class="uk-alert-<?= $message[1]?>" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p><?= $message[0]; ?></p>
</div>
<?php endforeach;?>
