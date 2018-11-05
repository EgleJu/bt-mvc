<?php
session_start();
if (7 > PHP_MAJOR_VERSION) {
    die('PHP version >= 7 required.');
}

if ('cli' == php_sapi_name()) {
    die('Runs in server environment only.');
}

$indexName = basename(__FILE__);
$baseDir   = strtr(__DIR__, '/\\', DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
$baseUrl   = substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], $indexName));
$pathInfo  = substr(parse_url($_SERVER['REQUEST_URI'])['path'], strlen($baseUrl));
$staticUrl = $baseUrl;


if (!isset($_SERVER['HTTP_REWRITE_ON'])) {
    $baseUrl = $baseUrl . $indexName . '/';
}


if (file_exists('core' . DIRECTORY_SEPARATOR . 'config.inc.php')) {
    include_once 'core' . DIRECTORY_SEPARATOR . 'config.inc.php';
} else {
    die('Structure mismatch: config.inc.php');
}

if (file_exists(SRC_DIR . 'settings.inc.php')) {
    include_once SRC_DIR . 'settings.inc.php';
}

$kernel = CORE_DIR . 'kernel.php';

if (file_exists($kernel)) {
    include_once($kernel);
    if (function_exists('run')) {
        $kernelRun = run();
        if (-1 !== $kernelRun) {
            die($kernelRun);
        } else {
            exit(0);
        }
    } else {
        die('Structure mismatch: run()');
    }
} else {
    die('Structure mismatch: kernel.php');
}
