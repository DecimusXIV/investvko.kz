<?php
$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return '';

$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('market:default');

$data=array();
    // Заголовки и надписи для полей
    $data['.title']=$modx->lexicon('market.info.title');
    $data['.label']=$modx->lexicon('market.fio.label');

// Формирование выбора типа объявления
    $list = $mrkt->getListType();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $option.='<input type="radio" name="type" value="'.$row['id'].'">&nbsp;'.$row['name'].'&nbsp;&nbsp;';
        }
    }
    $data['type']=$option;
// Формировани выбора района объявления
    $list = $mrkt->getListRegion();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $option.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }
    $data['region']=$option;

// Формирование выбора категории объявления
    $list = $mrkt->getListCategory();
    $option='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
	    $space =(($row['parent']===0)?'':'&nbsp;&nbsp;-&nbsp; ');
            $option.='<option value="'.$row['id'].'">'.$space.$row['name'].'</option>';
        }
    }
    $data['category']=$option;

return $mrkt->getChunk('market.form',$data);