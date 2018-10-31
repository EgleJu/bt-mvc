<?php

if (file_exists('config.inc.php')) {
    include_once 'config.inc.php';
    } else {
    die('Structure mismatch: config.inc.php');
    }


$indexName = basename(__FILE__);
$baseDir = strtr(__DIR__, '/\\', DIRECTORY_SEPARATOR);
$baseUrl = substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], $indexName));
$pathInfo = substr($_SERVER['REQUEST_URI'], strlen($baseUrl));
require_once CORE_COMPONENTS_DIR . 'Response.php';
if (!$pathInfo) {
    $pathInfo = '/';
}
if (!isset($_SERVER['HTTP_REWRITE_ON'])) {
    $baseUrl = $baseUrl . $indexName . $pathInfo;
}
$controllerPrefix = 'Default';
$actionPrefix = 'default';
$route = array_filter(explode('/', $pathInfo));
$controller = CONTROLLER_DIR . $controllerPrefix . 'Controller.php';
$action = $actionPrefix . 'Action';
$model = '';
if (!empty($route)) {
    if ($route[0] == $indexName) {
        unset($route[0]);
        $route = array_values($route);
    }
    if ((isset($route[0])) && ($route[0])) {
        $controller = str_replace($controllerPrefix, ucfirst(strtolower($route[0])), $controller);
    }
    if ((isset($route[1])) && ($route[1])) {
        $action = str_replace($actionPrefix, strtolower($route[1]), $action);
    }
    if ((isset($route[2])) && ($route[2])) {
        $model = $route[2];
    }
}
if (file_exists($controller)) {
    include_once $controller;
    if (function_exists($action)) {
        $result = $action($model);
        echo $result;
        exit();
    } else {
        http_response_code('404');
        exit();
    }
} else {
    http_response_code('400');
    exit();
}
    
?>

