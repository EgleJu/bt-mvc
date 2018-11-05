<?php
// Sanitizing html input
define('ALLOW_HTML_TAGS', '<strong><b><em><i><p><ul><div>');

// Language support
define('LANGUAGE_DEFAULT', 'lt');
define('LANGUAGE_FALLBACK', 'en');
define('LANGUAGE_SUPPORT', array('en', 'lt'));

// Translations
define('TRANSLATIONS_DIR', RESOURCES_DIR . 'translations' . DIRECTORY_SEPARATOR);
define('TRANSLATION_FILE_PATTERN', 'strings_*.l10n');

// Auth required
define('AUTH_REQUIRED', array('admin'));
define('AUTH_URL', 'auth' . DIRECTORY_SEPARATOR);
