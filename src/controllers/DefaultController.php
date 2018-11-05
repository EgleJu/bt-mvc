<?php
function defaultAction($modelId = null)
{
    require_once sanitizeSlash(MODEL_DIR . 'shared/PageModel.php');

    $pageVars = getPageVars();

    setMessage(t('Front page'), 'primary');

    return renderResponse(
        null,
        array('pageVars' => $pageVars,
            'pageTitle' => t('Welcome'),
        )
    );
}
