<?php
$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return '';

$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('market:default');

$id = 0;
$pr=null;
if ( (isset($_GET['view'])) && (intval($_GET['view'])>0) ) {
    $id = intval($_GET['view']);
    $pr = $mrkt->getAdvert($id);
    if ($pr!=null){
        $pr = $pr->toArray();
    }
}
if ($pr!=null){
    $data=$pr;
    return $mrkt->getChunk('market.view',$data);
}
else{
    $data=array('message'=>'не найдено объявление');
    return $mrkt->getChunk('market.view.error',$data);
}