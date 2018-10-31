<?php

function renderResponse($template = null, $variables = [], $type = 'html', $needLayout = true)
{
    $layout = TEMPLATE_DIR . BASE_TEMPLATE . '.' . $type . '.' . 'php';
    $header = 'Content-type: text/' . $type . ';charset=UTF-8';
    if ($template) {
        extract($variables);
        $template = TEMPLATE_DIR . $template . '.' . $type . '.' . 'php';
        if (file_exists($template)) {
            ob_start();
            include_once $template;
            if ($needLayout) {
                $variables['content'] = ob_get_clean();
            } else {
                header($header);
                return ob_get_clean();
            }
        } else {
            return 'File not found.';
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
    return 'File not found.';
}

?>