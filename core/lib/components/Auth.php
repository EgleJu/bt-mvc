<?php
function getAuthRequest($pathInfo)
{
    $pathArray = getPathArray($pathInfo);
    if (isset($pathArray[0])) {
        if (in_array($pathArray[0], AUTH_REQUIRED)) {
            if (!isAuth()) {
                return AUTH_URL;
            }
        }
    }
    return '';
}

function setAuth($auth = true)
{
    $_SESSION['auth'] = $auth;
    return;
}

function isAuth()
{
    if (isset($_SESSION['auth']) && $_SESSION['auth']) {
        return true;
    }
    return false;
}

function endAuth()
{
    return setAuth(false);
}
