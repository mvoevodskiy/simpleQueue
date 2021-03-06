<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var simpleQueue $simpleQueue */
$simpleQueue = $modx->getService('simplequeue', 'simpleQueue', $modx->getOption('simplequeue_core_path', null, $modx->getOption('core_path') . 'components/simplequeue/') . 'model/simplequeue/');
$modx->lexicon->load('simplequeue:default');

// handle request
$corePath = $modx->getOption('simplequeue_core_path', null, $modx->getOption('core_path') . 'components/simplequeue/');
$path = $modx->getOption('processorsPath', $simpleQueue->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));