<?php
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';

$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);

$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) return '';

$list = $modx->getCollection('MapIcon');


$output = "var mapIcon = [];";
/*
	var mapStyle[Id]=L.icon(Gist);
*/

if (count($list )>0)
	foreach($list  as $row){
		$row = $row->toArray();
		$output .= 'mapIcon['.$row['id'].'] = L.icon({'.$row['Gist'].'});';		
	}
return $output;