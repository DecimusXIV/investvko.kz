<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';
 
$corePath = $modx->getOption('recall.core_path',null,$modx->getOption('core_path').'components/recall/');
require_once $corePath.'model/recall/recall.class.php';
$modx->recall = new Recall($modx);
 
$modx->lexicon->load('recall:default');
 
/* handle request */
$path = $modx->getOption('processorsPath',$modx->recall->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));