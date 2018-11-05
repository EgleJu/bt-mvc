<?php
function getLanguageRequest($request)
{
    return $request['lang'] ?? getLanguage();
}

function getLanguage()
{
    $languageDefault = getDefaultLanguage();
    $languageFallback = getFallbackLanguage();
    if (isset($_SESSION['language']) && $_SESSION['language']) {
        return $_SESSION['language'];
    } elseif ($languageDefault) {
        return $languageDefault;
    } elseif ($languageFallback) {
        return $languageFallback;
    }
    return '';
}

function getFallbackLanguage()
{
    $languageFallback = LANGUAGE_FALLBACK;
    if ($languageFallback) {
        return $languageFallback;
    }
    return '';
}

function getDefaultLanguage()
{
    $languageDefault = LANGUAGE_DEFAULT;
    if ($languageDefault) {
        return $languageDefault;
    }
    return '';
}

function getSupportedLanguages()
{
    $supported = LANGUAGE_SUPPORT;
    if ($supported) {
        return $supported;
    }
    return ['en'];
}

function setLanguage($lang = null)
{
    if ($lang) {
        if (in_array($lang, getSupportedLanguages())) {
            $_SESSION['language'] = $lang;
        } else {
            $_SESSION['language'] = getFallbackLanguage();
        }
    } else {
        $_SESSION['language']  = getDefaultLanguage();
    }
    return '';
}
