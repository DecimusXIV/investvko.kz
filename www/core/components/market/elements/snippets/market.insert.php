<?php
function getExtension($filename) {
    return substr(strrchr($filename, '.'), 1);
}

$mrkt = $modx->getService('market','Market',$modx->getOption('market.core_path',null,$modx->getOption('core_path').'components/market/').'model/market/',$scriptProperties);
if (!($mrkt instanceof Market)) return '';

$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('market:default');

$today = date("Y-m-d H:i:s");

$hook->setValues(array(
    'created' => $today,
    'published' => '1',
));

$type = intval($hook->getValue('type'));

if ($type===0) {
	$hook->addError('type',"Выберите тип объявления");
	return false;
}

$obj = $modx->newObject('mrktAdvert');

$obj->set('mail',$hook->getValue('mail'));

$obj->set('category',$hook->getValue('category'));
$obj->set('region',$hook->getValue('region'));
$obj->set('type',$hook->getValue('type'));

$obj->set('contact',$hook->getValue('contact'));
$obj->set('content',$hook->getValue('content'));

$obj->set('price',$hook->getValue('price'));
$obj->set('amount',$hook->getValue('amount'));
$obj->set('unit',$hook->getValue('units'));

$obj->set('created',$hook->getValue('created'));
$obj->set('published',$hook->getValue('published'));

$obj->save();



if (is_uploaded_file($_FILES["photo"]["tmp_name"])){
	if(!is_uploaded_file($_FILES["photo"]["tmp_name"]))
	{
	    $hook->addError('error_message',"Ошибка при загрузке файла");
	    return false;
	}
	if($_FILES["photo"]["size"] > 1024*3*1024)
	{
	    $hook->addError('error_message',"Размер файла превышает три мегабайта");
	    return false;
	}
	// Перемещение файла
	$path="/var/www/investvko.kz/www/assets/images/market/";
	$filename=$obj->getPrimaryKey().'.'.getExtension($_FILES["photo"]["name"]);
	move_uploaded_file($_FILES["photo"]["tmp_name"], $path.$filename);
	$obj->set('photo',$filename);

}
else{
	$obj->set('photo',null);
}

if (!$obj->save()){
    return false;
}



$url = $modx->makeUrl(103);
$modx->sendRedirect($url);
die;

return true;