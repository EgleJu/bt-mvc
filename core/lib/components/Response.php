<?php
function redirectResponse($location = '', $redirectId = 302, $out = false)
{
    if (!$out) {
        $location = BASE_URL . $location;
    }
    header('Location: ' . $location, true, $redirectId);
    exit();
}

function renderResponse($template = null, $variables = [], $type = 'html', $needLayout = true)
{
    $layout = TEMPLATE_DIR . BASE_TEMPLATE . '.' . $type . '.' . 'php';

    $header = getCntTypeString($type);

    if ($template) {
        $template = sanitizeSlash($template);
        
        extract($variables);
        
        $template = TEMPLATE_DIR . $template . '.' . $type . '.' . 'php';

        if (file_exists($template)) {
            ob_start();
            include_once $template;
            if ($needLayout) {
                $variables['content'] = ob_get_clean();
            } else {
                return ob_get_clean();
            }
        } else {
            return 'Template file not found.';
        }
    }

    if ($needLayout) {
        if (file_exists($layout)) {
            extract($variables);
            ob_start();
            include_once $layout;
            header($header);
            return ob_get_clean();
        }
    }
    return 'Template file not found.';
}

function renderPlainResponse($template = null, $variables = [])
{
    $header = getCntTypeString('plain');
    if ($template) {
        $template = sanitizeSlash($template);
        $template = TEMPLATE_DIR . $template . '.' . 'plain' . '.' . 'php';
        if (file_exists($template)) {
            $content = file_get_contents($template);
            header($header);
            return strtr($content, $variables);
        } else {
            return 'Template file not found.';
        }
    }
    return '';
}

function jsonResponse($array = [], $mode = JSON_UNESCAPED_UNICODE)
{
    $header = getCntTypeString('json');
    if (is_array($array)) {
        $json = json_encode($array, $mode);
        if ($json) {
            header($header);
            ob_start();
            echo $json;
            return ob_get_clean();
        } else {
            return '{"json":"error"}';
        }
    }
    return '{"json":"empty"}';
}

function httpStatusResponse($statusId = 404)
{
    http_response_code($statusId);
    return $statusId;
}

function sendResponse($response = null)
{
    if ($response) {
        echo $response;
        return true;
    }
    return false;
}


function getCntTypeString($contentType)
{
    $cType = 'Content-type: ';
    switch ($contentType) {
        case 'html':
        case 'xml':
        case 'plain':
            $cType .= 'text/' . $contentType;
            break;
        case 'json':
            $cType .= 'application/' . $contentType;
            break;
    }
    return $cType . ';charset=UTF-8';
}
