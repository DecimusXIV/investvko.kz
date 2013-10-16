<?php
$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return 'error';

$m = $modx->getManager();
$created = $m->createObjectContainer('mrktType');
echo $created ? 'Table created.' : 'Table not created.';
$created = $m->createObjectContainer('mrktCategory');
echo $created ? 'Table created.' : 'Table not created.';
$created = $m->createObjectContainer('mrktRegion');
echo $created ? 'Table created.' : 'Table not created.';
$created = $m->createObjectContainer('mrktAdvert');
echo $created ? 'Table created.' : 'Table not created.';

return '';