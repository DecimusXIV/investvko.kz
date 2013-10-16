<?php
function elements_modsnippet_43($scriptProperties= array()) {
global $modx;
if (is_array($scriptProperties)) {
extract($scriptProperties, EXTR_SKIP);
}
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';
$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);
$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) 
    return 'error Pack';

$list = $modx->getCollection('MapLayer');

$output='var mapLayers={};';

foreach($list as $row){
    $row = $row->toArray();
	$output .='mapLayers["'.$row['id'].'"] = {id:'.$row['id'].',title:"'.$row['Title'].'"};';
}

return $output;
}
