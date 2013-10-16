<?php
function elements_modsnippet_44($scriptProperties= array()) {
global $modx;
if (is_array($scriptProperties)) {
extract($scriptProperties, EXTR_SKIP);
}
$defaultMapsCorePath = $modx->getOption('core_path').'components/maps/';
$mapsCorePath = $modx->getOption('maps.core_path',null,$defaultMapsCorePath);
$proj = $modx->getService('maps','Maps',$mapsCorePath.'model/maps/',$scriptProperties);

if (!($proj instanceof Maps)) 
    return 'error Pack';

$list = $modx->getCollection('MapObject');

if (count($list)==0)
	return 'alert("Нет объектов для отображения")';

$output='var mapObjects={};';

foreach($list as $row){
	$row = $row->toArray();
    $title = htmlspecialchars($row['Title']);
    $msg = $row['Message'];
	if ($row['Type']=='marker'){
        $output .='mapObjects["'.$row['id'].'"]={
            id:"'.$row['id'].'"
            ,layer:"'.$row['LayerId'].'"
            ,style:"'.$row['IconId'].'"
            ,type:"marker"
            ,title:"'.$title.'"
            ,message:"'.$msg.'"
            ,geometry:['.$row['Geometry'].']
            };';
	}
    elseif($row['Type']=='polygon'){
    
        $output .='mapObjects["'.$row['id'].'"]={
                id:"'.$row['id'].'"
                ,layer:"'.$row['LayerId'].'"
                ,style:"'.$row['IconId'].'"
                ,type:"polygon"
                ,message:"'.$msg.'"
                };';
            /**/
    }
}
return $output;
}
