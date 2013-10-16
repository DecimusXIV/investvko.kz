<?php
$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return '';

global $filterInput;
if (!isset($filterInput)){
	$filterInput=$mrkt->readGetFilterInput();
}

$data=array();

// Формированик выбора категории объявления
    $list = $mrkt->getListCategory();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $seleted =(($row['id']===$filterInput['category'])?'selected':'');
	    $space =(($row['parent']===0)?'':'&nbsp;&nbsp;-&nbsp; ');
            $option.='<option value="'.$row['id'].'" '.$seleted.' >'.$space.$row['name'].'</option>';
        }
    }
    $data['category']=$option;
    
// Формированик выбора района объявления
    $list = $mrkt->getListRegion();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $seleted =(($row['id']===$filterInput['region'])?'selected':'');
            $option.='<option value="'.$row['id'].'" '.$seleted.' >'.$row['name'].'</option>';
        }
    }
    $data['region']=$option;

// Формированик выбора района объявления
    $list = $mrkt->getListType();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $checked =(($row['id']===$filterInput['type'])?'checked':'');
            $option.='<input type="radio" name="type" value="'.$row['id'].'" '.$checked.' />'.$row['name'].' ';
        }
    }
    $data['type']=$option;

$data['min_price']=$filterInput['min_price'];
$data['max_price']=$filterInput['max_price'];

$data['search']=$filterInput['search'];


return $mrkt->getChunk('market.table.filter',$data);