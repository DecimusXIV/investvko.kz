<?php
$prjct = $modx->getService('projects','Projects',$modx->getOption('projects.core_path',null,$modx->getOption('core_path').'components/projects/').'model/projects/',$scriptProperties);
if (!($prjct instanceof Projects)) return '';

// id ресурса для просмотра информации о инвест проекте
$view_id = $modx->getOption('view',$scriptProperties,'5');

// Входные парамметры для фильтра и объявления контейнера
global $filterInput;
if (!isset($filterInput)){
	$filterInput=$prjct->readGetFilterInput();
}

$data= array();

// Формируем тело таблицы
    $tbody='';
    $list=$prjct->getProjectsListByFilter($filterInput);
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            $tbody.=$prjct->getChunk('projects.table.row',$row);
        }
    }
    else{
        $tbody='<tr><td colspan=5>Нет записей</td></tr>';
    }
    $data['tbody']=$tbody;

// Формируем пагинацию для таблицы
    $pagination='';
    $page = $filterInput;
    $currentPage = $page['page'];unset($page['page']);
    $url_page = $modx->makeUrl($modx->resourceIdentifier,'',$page); //$currentPage = $page['page'];
    $l =$prjct->limit;
    $n =$prjct->countRows;
    $ost=($n % $l); $max_page = ($n-$ost)/$l;

    if (($n % $l)>0) { $max_page++; }

    if ($max_page>1){
        $max_page--;
        if ($currentPage!=0){
            $pagination.='<a href="'.$url_page.'&page='.($currentPage-1).'">Предыдущая</a>';
        }
        else{
            $pagination.='<a>Предыдущая</a>';
        }
        if ($currentPage!=$max_page){
            $pagination.='<a href="'.$url_page.'&page='.($currentPage+1).'">Следующая</a>';
        }
        else{
            $pagination.='<a>Следующая</a>';
        }
    }
    $data['pagination']=$pagination;

$data['script']='var url_view="'.$modx->makeUrl($view_id).'";var url_field="'.$filterInput['field'].'";';

return $prjct->getChunk('projects.table',$data);