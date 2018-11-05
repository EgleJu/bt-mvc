<?php
function defaultAction($modelId = null)
{
    require_once sanitizeSlash(MODEL_DIR . 'shared/PageModel.php');
    
    $pageVars = getPageVars();

    if (!isAuth()) {
        return loginAction();
    }

    setMessage(t('Logged in'), 'primary');

    return renderResponse(
        null,
        array('pageVars' => $pageVars,
            'pageTitle' => t('Authentification'),
        )
    );
}

function loginAction()
{
    require_once sanitizeSlash(MODEL_DIR . 'shared/PageModel.php');

    $pageVars = getPageVars();
    
    $postAction = BASE_URL . 'auth/login';

    if ((isset($_POST['uemail'])) && ($_POST['uemail'] == 'vitas@lva.lt')) {
        setAuth();
        $msg = t('Login success');
        $msgType = 'success';
        setMessage($msg, $msgType);
        return defaultAction();
    } else {
        endAuth();
        if (!isset($_POST['uemail'])) {
            $msg = t('Please login');
            $msgType = 'primary';
        } else {
            $msg = t('Incorrect e-mail');
            $msgType = 'danger';
        }

        setMessage($msg, $msgType);

        return renderResponse(
            sanitizeSlash('login/login_form'),
            array('action'  => $postAction,
                'pageTitle' => t('Login'),
                'pageVars'  => $pageVars,
            )
        );
    }
}

function logoutAction()
{
    endAuth();
    setMessage(t('Logout performed'), 'success');
    return redirectResponse();
}
