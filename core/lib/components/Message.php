<?php
function setMessage($msg, $type)
{
    $_SESSION['message'][] = array($msg, $type);
    return true;
}

function getMessages()
{
    if (isset($_SESSION['message']) and $_SESSION['message']) {
        return $_SESSION['message'];
    }
    return [];
}

function endMessage()
{
    if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
    }
    return true;
}
