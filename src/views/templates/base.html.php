<!DOCTYPE html>
<html>
<head>
<?php include_once TEMPLATE_STATIC_DIR . 'block_meta.inc.html';?>
<?php include_once TEMPLATE_STATIC_DIR . 'stylesheets.inc.html.php';?>
<title><?= $pageVars['metaTitle'] ?? ''; ?></title>
</head>
<body>
<nav class="uk-navbar-container" uk-navbar>
<div class="uk-navbar-left">
<a href="<?= STATIC_URL; ?>" class="uk-navbar-item uk-logo"><?= $pageVars['siteName'] ?? ''; ?></a>
</div>
<div class="uk-navbar-center">
<?php /*Menu here*/?>
</div>
<div class="uk-navbar-right">
<?= loginButton() ?? ''; ?>
<?= langSwitcher() ?? ''; ?>
</div>
</nav>
<div class="uk-container">
<h1><?= $pageTitle ?? ''; ?></h1>
<?php /*Content here*/?>
<?= displayMessages() ?? '';?>
<?= $content ??  '';?>
</div>
<?php include_once TEMPLATE_STATIC_DIR . 'javascript.inc.html.php';?>
</body>
</html>

