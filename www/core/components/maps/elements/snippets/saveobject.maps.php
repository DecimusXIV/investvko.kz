<?php
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';

$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);

$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) return '';

if (!isset($_POST['obj'])) return 'Ошибка входных данных';

$tmpObj = $_POST['obj'];

echo 'id '.$tmpObj['id'].'<br>';
echo 'Type '.$tmpObj['type'].'<br>';
echo 'Geometry '.$tmpObj['geometry'].'<br>';

if ($tmpObj['id']!="new"){
	$obj = $modx->getObject('MapObject',$tmpObj['id']);
}
else{
	$obj = $modx->newObject('MapObject');	
}


$obj->set('LayerId',1);
$obj->set('StyleId',1);
$obj->set('IconId',1);

$obj->set('Type',$tmpObj['type']);

$obj->set('Title','Новый маркер');
$obj->set('Description','Описание нового маркера');
$obj->set('Geometry',$tmpObj['geometry']);

if($obj->save()){
	$output='Сохранено!';
}
else{
	$output='Ошибка при сохранении';
}




return $output;