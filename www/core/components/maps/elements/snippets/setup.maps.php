<?php
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';

$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);

$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) return '';


$m = $modx->getManager();
$created = $m->createObjectContainer('MapLayer');
echo $created ? 'Table created.MapLayer' : 'Table not created.';
echo "<br>";
$created = $m->createObjectContainer('MapObject');
echo $created ? 'Table created.MapObject' : 'Table not created.';
echo "<br>";
$created = $m->createObjectContainer('MapStyle');
echo $created ? 'Table created.MapStyle' : 'Table not created.';
echo "<br>";
$created = $m->createObjectContainer('MapIcon');
echo $created ? 'Table created.MapIcon' : 'Table not created.';
echo "<hr>";
/**/
$layers = $modx->getCollection('MapLayer');
$style = $modx->getCollection('MapStyle');
$icon = $modx->getCollection('MapIcon');
$maps = $modx->getCollection('MapObject');


$output = count($maps);
if (count($layers)>0)
	foreach($layers as $row){
		$row = $row->toArray();
		var_dump($row);
		echo '<br>';
	}
echo '<hr>';
if (count($style)>0)
	foreach($style as $row){
		$row = $row->toArray();
		var_dump($row);
		echo '<br>';
	}
echo '<hr>';
if (count($icon)>0)
	foreach($icon as $row){
		$row = $row->toArray();
		var_dump($row);
		echo '<br>';
	}
echo '<hr>';
if (count($maps)>0)
	foreach($maps as $row){
		$row = $row->toArray();
		var_dump($row);
		echo '<br>';
	}
echo '<hr>';
 
return $output;