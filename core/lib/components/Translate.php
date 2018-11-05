<?php
function t($string = '', $options = [])
{
    if (!$string) {
        return;
    }
    $translated = '';
    $content = getTranslationFile();
    if ($content) {
        foreach ($content as $line) {
            if (strpos($line, '#') === 0) {
                continue;
            }
            if (strpos($line, $string) !== false) {
                $translated = trim(explode('=', trim($line))[1]);
                break;
            }
        }
    }

    if (!$translated) {
        $translated = $string;
    }

    if ($options && $translated) {
        $translated = strtr($translated, $options);
    }
    return sanitizeToPlain($translated);
}

function getTranslationFile()
{
    $lang = getLanguage();
    $fileName = preg_replace('/\*/', $lang, TRANSLATION_FILE_PATTERN);
    $file = TRANSLATIONS_DIR . $fileName;
    if (file_exists($file)) {
        return file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
    return [];
}
