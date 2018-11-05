<?php
function langSwitcher()
{
    $supported    = getSupportedLanguages();
    $requestPath  = getRequest()['path'];
    $requestQuery = getRequest()['get'];

    if (isset($requestQuery['lang'])) {
        unset($requestQuery['lang']);
    }

    foreach ($supported as $language) {
        if (!empty($requestQuery)) {
            $linkArray[$language] = BASE_URL
            . $requestPath . '?'
            . http_build_query($requestQuery) . '&lang=' . $language;
        } else {
            $linkArray[$language] = BASE_URL . $requestPath . '?' . 'lang=' . $language;
        }
    }
    return renderResponse(
        'lang/lang_switcher',
        array('links' => $linkArray),
        'html',
        false
    );
}
