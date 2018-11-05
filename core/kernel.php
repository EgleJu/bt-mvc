<?php
function run()
{
    $components = loadComponents();

    if (-1 !== $components) {
        return $components;
    }

    $userViews = loadUserViews();
    
    if (-1 !== $userViews) {
        return $userViews;
    }

    $request = getRequest();

    $auth    = getAuthRequest($request['path']);

    if ($auth) {
        return redirectResponse($auth);
    }

    $lang    = getLanguageRequest($request['get']);

    if ($lang) {
        setLanguage($lang);
    }

    $route   = getRoute($request['path']);

    extract($route);

    if (file_exists($controller)) {
        include_once($controller);
        if (function_exists($action)) {
            $response = $action($model);
        } else {
            $response = httpStatusResponse('404');
        }
    } else {
        $response = httpStatusResponse('400');
    }

    if ($response) {
        $send = sendResponse($response);
        return -1;
    } else {
        return 'Unknown response.';
    }
}

function loadComponents()
{
    //$components = glob(CORE_COMPONENTS_DIR . '*.php', GLOB_ERR);
    if (file_exists(CORE_DIR . 'components.json')) {
        $components = json_decode(file_get_contents(CORE_DIR . 'components.json'), true);
    } else {
        return 'Structure mismatch: ' . 'components.json';
    }

    if (isset($components['require']) and $components['require']) {
        foreach ($components['require'] as $component) {
            if (file_exists(CORE_COMPONENTS_DIR . $component)) {
                include_once CORE_COMPONENTS_DIR . $component;
            } else {
                return 'Structure mismatch: ' . $component;
                break;
            }
        }
    } else {
        return 'Invalid file structure: components.json';
    }
    return -1;
}

function loadUserViews()
{
    if (file_exists(VIEW_DIR . 'views.json')) {
        $views = json_decode(file_get_contents(VIEW_DIR . 'views.json'), true);
    } else {
        return 'Structure mismatch: views.json';
    }
    if (isset($views['require']) and $views['require']) {
        foreach ($views['require'] as $view) {
            if (file_exists(VIEW_DIR . $view)) {
                include_once VIEW_DIR . $view;
            }
        }
    } else {
        return 'Invalid file structure: views.json';
    }
    return -1;
}
