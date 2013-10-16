<?php
$prjct = $modx->getService('projects','Projects',$modx->getOption('projects.core_path',null,$modx->getOption('core_path').'components/projects/').'model/projects/',$scriptProperties);
if (!($prjct instanceof Projects)) return '';

// id ресурса для просмотра информации о инвест проекте
$view_id = $modx->getOption('view',$scriptProperties,'2');

// Подключение словаря компонента
$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('projects:default');

$id = 0;
$pr=null;
if ( (isset($_GET['project'])) && (intval($_GET['project'])>0) ) {
    $id = intval($_GET['project']);
    $pr = $prjct->getProject($id);
    if ($pr!=null){
        $pr = $pr->toArray();
        $data= array('project' => $pr, 'url_back' => $modx->makeUrl($view_id));	
		return $prjct->getChunk('projects.view',$data);
    }
}
return $prjct->getChunk('projects.view.error');