<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces([
    'dailysale\Models'      => $config->application->modelsDir,
    'dailysale\Controllers' => $config->application->controllersDir,
    'dailysale\Forms'       => $config->application->formsDir,
    'dailysale'             => $config->application->libraryDir
]);

$loader->register();

// Use composer autoloader to load vendor classes
require_once __DIR__ . '/../../vendor/autoload.php';
