<?php
function loginButton()
{
    $url = BASE_URL . AUTH_URL;
    $buttonVal = t('Login');
    if (isAuth()) {
        $url = BASE_URL . AUTH_URL . 'logout';
        $buttonVal = t('Logout');
    }
    return renderResponse(
        'login/login_button',
        array('url' => $url, 'buttonVal' => $buttonVal),
        'html',
        false
    );
}
