<!DOCTYPE html>
<html>
<head>
<?php /*Block static meta tags. Simple include*/?>
<?php /*Block static stylesheets. Simple include*/?>
<title><?= $pageTitle; ?></title>
</head>
<body>
<nav>
<a href="<?php /*Base path variable here or #*/?>#"><?= $siteName; ?></a>
<?php /*Menu variable here*/?>
</nav>
<div>
<h1><?= $siteName; ?></h1>
<?php /*Content variable here*/?>
<?= $content; ?>
</div>
<?php /*Block static Javascript. Simple include*/?>
</body>
</html>