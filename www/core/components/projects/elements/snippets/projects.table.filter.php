<?php
$prjct = $modx->getService('projects','Projects',$modx->getOption('projects.core_path',null,$modx->getOption('core_path').'components/projects/').'model/projects/',$scriptProperties);
if (!($prjct instanceof Projects)) return '';

// Входные парамметры для фильтра и объявления контейнера
global $filterInput;
if (!isset($filterInput)){
	$filterInput=$prjct->readGetFilterInput();
}

$data= array();

// Заполнения отрасли инвестиционных проектов
	$options="";
	$list = $prjct->getCategorybyName();
	if(count($list)>0){
	    foreach($list as $row){
	        $row=$row->toArray();
	        $options.='<option value="'.$row['id'].'" '.(($filterInput['category']===$row['id'])?'selected':'').' >'.$row['name'].'</option>';
	    }
	}
	$data['categories']=$options;

// Заполнение поля Поиска
	$data['search']=$filterInput['search'];

return $prjct->getChunk('projects.table.filter',$data);