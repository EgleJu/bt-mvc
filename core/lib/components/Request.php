<?php
function getRequest()
{
    $pathInfo = sanitizeUri(PATH_INFO);

    if (!empty($_GET)) {
        $_GET = sanitizeGet();
    }
    if (!empty($_POST)) {
        $_POST = sanitizePost();
    }

    $request = array(
        'method'    => $_SERVER['REQUEST_METHOD'],
        'path'      => $pathInfo,
        'query'     => $_SERVER['QUERY_STRING'],
        'get'       => $_GET,
        'post'      => $_POST,
        'files'     => $_FILES,
        'cookie'    => $_COOKIE,
    );
    return $request;
}

function getCallback()
{
    if ((isset($_SESSION['callback'])) && ($_SESSION['callback'])) {
        return $_SESSION['callback'];
    }
    return '';
}


function setCallback($callback = null)
{
    if ($callback) {
        $_SESSION['callback'] = $callback;
    }
    return;
}

function endCallback()
{
    if (isset($_SESSION['callback'])) {
        unset($_SESSION['callback']);
    }
    return;
}

function setRequest($request = null)
{
    if ($request) {
        $_SESSION['request'] = $request;
    }
    return;
}

function endRequest()
{
    if (isset($_SESSION['request'])) {
        unset($_SESSION['request']);
    }
    return;
}
