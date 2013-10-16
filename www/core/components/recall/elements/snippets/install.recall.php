<?php
/**
 * @package recall
 */
$dood = $modx->getService('recall','Recall',$modx->getOption('recall.core_path',null,$modx->getOption('core_path').'components/recall/').'model/recall/',$scriptProperties);
if (!($dood instanceof Recall)) return '';

$output = '';

$m = $modx->getManager();
$created = $m->createObjectContainer('rclMessage');
$output .= '<hr>rclMessage.';
$output .= $created ? 'Table created.' : 'Table not created.';
$output .= '<hr>';

/* build query */
$recall = $modx->getCollection('rclMessage');

/* iterate */
echo count($recall);

return $output;