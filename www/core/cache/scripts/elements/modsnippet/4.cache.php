<?php  return 'function elements_modsnippet_4($scriptProperties= array()) {
global $modx;
if (is_array($scriptProperties)) {
extract($scriptProperties, EXTR_SKIP);
}
$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
	return \'error Pack\';

$list = $modx->getCollection(\'MapIcon\');

$output=\'var mapIcons=[];var mapIconsName=[];\';
$s=\'\';
foreach($list as $row){
	$row = $row->toArray();
	$output .=\'mapIcons[\'.$row[\'id\'].\'] = L.icon({\'.$row[\'Gist\'].\'});\';
    $s.=\'mapIconsName[\'.$row[\'id\'].\']="\'.$row[\'Title\'].\'";\';
}

return $output.$s;
}
';