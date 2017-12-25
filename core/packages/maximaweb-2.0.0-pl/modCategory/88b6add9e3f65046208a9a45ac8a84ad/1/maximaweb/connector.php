<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var maximaweb $maximaweb */
$maximaweb = $modx->getService('maximaweb', 'maximaweb', MODX_CORE_PATH . 'components/maximaweb/model/');
$modx->lexicon->load('maximaweb:default');

// handle request
$corePath = $modx->getOption('maximaweb_core_path', null, $modx->getOption('core_path') . 'components/maximaweb/');
$path = $modx->getOption('processorsPath', $maximaweb->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);