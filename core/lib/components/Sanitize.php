<?php
function sanitizeUri($uri)
{
    return preg_replace('/[^'. ALLOW_ROUTE_CHARS .  ']+/', '', $uri);
}

function sanitizeGet()
{
    return filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
}

function sanitizePost()
{
    return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}

function sanitizeToPlain($string = '')
{
    return htmlentities(strip_tags($string));
}

function sanitizeToHtml($string = '', $allowTags = '')
{
    return strip_tags($string, ALLOW_HTML_TAGS);
}

function sanitizeSlash($string)
{
    return strtr($string, '/\\', DIRECTORY_SEPARATOR);
}
