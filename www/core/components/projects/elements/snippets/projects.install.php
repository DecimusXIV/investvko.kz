<?php
$prjct = $modx->getService('projects','Projects',$modx->getOption('projects.core_path',null,$modx->getOption('core_path').'components/projects/').'model/projects/',$scriptProperties);
if (!($prjct instanceof Projects)) return 'error';

$m = $modx->getManager();
$created = $m->createObjectContainer('prjctCategory');
echo $created ? 'Table created.' : 'Table not created.<br>';

$created = $m->createObjectContainer('prjctGrade');
echo $created ? 'Table created.' : 'Table not created.<br>';

$created = $m->createObjectContainer('prjctProject');
echo $created ? 'Table created.' : 'Table not created.<br>';

return 'Done.';