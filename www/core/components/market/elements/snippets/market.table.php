<?php
$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return '';

$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('market:default');

$view_id = $modx->getOption('view',$scriptProperties,'104');

global $filterInput;
if (!isset($filterInput)){
    $filterInput=$mrkt->readGetFilterInput();
}

$list=$mrkt->getAdvertsListByFilter($filterInput);

$data=array();

// Формируем заголовок
    $thead='';
    $data['thead']=$thead;

// Формируем тело таблицы
    $tbody='';
    if (count($list)>0){
        foreach($list as $row){
            $row=$row->toArray();
            if ($row['photo']===NULL){
                $row['photo.class'] = 'img-none';
            }
            $tbody.=$mrkt->getChunk('market.table.row',$row);
        }
    }
    else{
        $tbody='<tr><td>Нет записей</td></tr>';
        }
    $data['tbody']=$tbody;

// Формируем пагинацию для таблицы
    $pagination='';
    $page = $filterInput;
    $currentPage = $page['page'];unset($page['page']);
    $url_page = $modx->makeUrl($modx->resourceIdentifier,'',$page); //$currentPage = $page['page'];
    $l =$mrkt->limit;
    $n =$mrkt->countRows;
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

return $mrkt->getChunk('market.table',$data);