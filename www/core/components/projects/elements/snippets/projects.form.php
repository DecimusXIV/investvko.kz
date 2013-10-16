<?php
$prjct = $modx->getService('projects','Projects',$modx->getOption('projects.core_path',null,$modx->getOption('core_path').'components/projects/').'model/projects/',$scriptProperties);
if (!($prjct instanceof Projects)) return '';

$view_id = $modx->getOption('view',$scriptProperties,'0');

$data = array();

// Формирование выпадающего списка категории
    $options='';
    $list = $prjct->getCategorybyName();
    if(count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $s='[[!+fi.category:is=`'.$row['id'].'`:then=`selected`]]';
            $options.='<option value="'.$row['id'].'" '.$s.'  >'.$row['name'].'</option>';
        }
    }
    $data['categories']=$options;

$data['action_id']=$view_id;
//$obj = $modx->newObject('prjctProject');
//var_dump($obj->toArray());

return $prjct->getChunk('projects.form',$data);