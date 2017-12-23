<?php
// Boot up MODX
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');

// Load the modRestService class and pass it some basic configuration
$rest = $modx->getService('rest', 'rest.modRestService', '', array(
    'basePath' => dirname(__FILE__) . '/Controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'Maxima',
    'xmlRootNode' => 'response',
));
// Prepare the request
$rest->prepare();
// Run the request
$rest->process();
