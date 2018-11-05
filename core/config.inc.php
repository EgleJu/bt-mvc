<?php
// Environment
define('BASE_DIR', $baseDir);
define('BASE_URL', $baseUrl);
define('PATH_INFO', $pathInfo);
define('INDEX_NAME', $indexName);
define('STATIC_URL', $staticUrl);

// Core components paths
define('CORE_DIR', BASE_DIR . 'core' . DIRECTORY_SEPARATOR);
define('CORE_LIB_DIR', CORE_DIR . 'lib' . DIRECTORY_SEPARATOR);
define('CORE_COMPONENTS_DIR', CORE_LIB_DIR . 'components' . DIRECTORY_SEPARATOR);

// User code paths
define('SRC_DIR', BASE_DIR . 'src' . DIRECTORY_SEPARATOR);
define('MODEL_DIR', SRC_DIR . 'models' . DIRECTORY_SEPARATOR);
define('CONTROLLER_DIR', SRC_DIR . 'controllers' . DIRECTORY_SEPARATOR);
define('VIEW_DIR', SRC_DIR . 'views' . DIRECTORY_SEPARATOR);
define('TEMPLATE_DIR', VIEW_DIR . 'templates'. DIRECTORY_SEPARATOR);
define('TEMPLATE_STATIC_DIR', TEMPLATE_DIR . 'static' . DIRECTORY_SEPARATOR);

// Main layout template file name base
define('BASE_TEMPLATE', 'base');

// Where to put resources: translations, etc.
define('RESOURCES_DIR', BASE_DIR . 'resources' . DIRECTORY_SEPARATOR);

// Public dir
define('PUBLIC_DIR', BASE_DIR . 'public' . DIRECTORY_SEPARATOR);

// A bit of sanitizing
define('ALLOW_ROUTE_CHARS', 'a-zA-Z0-9\-\/_.');
