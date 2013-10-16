<?php
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';
$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);
$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) 
	return 'error Pack';

$list = $modx->getCollection('MapObject');

if (count($list)==0)
	return 'alert("Нет объектов для отображения")';

$output='';

foreach($list as $row){
	$row = $row->toArray();

	if ($row['Type']=='marker'){
		$output .='var tmpm = L.marker(['.$row['Geometry'].'],{icon:mapIcons['.$row['IconId'].']});';
		$output .='tmpm .dbId= '.$row['id'].';tmpm .dbType= "marker";';
		$output .= 'tmpm.bindPopup("'.$row['id'].' - '.$row['Title'].'");tmpm.addTo(drawnItems);';		
	}
	elseif ($row['Type']=='polygon'){
		$output .='var tmpm = L.polygon([ '.$row['Geometry'].' ]);';
		$output .='tmpm .dbId= '.$row['id'].';tmpm .dbType= "polygon";';
		$output .= 'tmpm.bindPopup("'.$row['id'].' - '.$row['Title'].'");tmpm.addTo(drawnItems);';
	}
	else{

	}

	
}

return $output;