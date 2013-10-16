<?php
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';

$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);

$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) return '';

$style = $modx->getCollection('MapStyle');


$output = "var mapStyle = [];";

if (count($style )>0)
	foreach($style  as $row){
		$row = $row->toArray();
		$output .= 'mapStyle['.$row['id'].'] = {'.$row['Gist'].'};';		
	}
return $output;