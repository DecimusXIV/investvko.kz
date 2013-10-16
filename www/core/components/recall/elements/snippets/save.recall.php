<?php
$rcl = $modx->getService('recall','Recall',$modx->getOption('recall.core_path',null,$modx->getOption('core_path').'components/recall/').'model/recall/',$scriptProperties);
if (!($rcl instanceof Recall)) return '{"result":"error"}';

// Проверка по времени
$location = $_SERVER['HTTP_REFERER'];
$ip_adress = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d H:i:s");
$sdate = strtotime($date)-120;

$msg= $modx->getCollection('rclMessage',array(
    "ip_address"=>$ip_adress,
    "location"=>$location,
    "created:>="=>date("Y-m-d H:i:s", $sdate)
));
if (count($msg)>0){
    return '{"result":"wait"}';
}

// Считывание входных парамметров
$fio='Фамилия не указана';
if ((isset($_POST['fio']))&&($_POST['fio']!=="")){
    $fio=$_POST['fio'];
}
$content='Текст не указан';
if ((isset($_POST['content']))&&($_POST['content']!=="")){
    $content=$_POST['content'];
}
$mail='Почтовый адрес не указан';
if ((isset($_POST['mail']))&&($_POST['mail']!=="")){
    $mail=$_POST['mail'];
}


$data = array(
    "fio" =>$fio,
    "content" => $content,
    "mail" => $mail,
    "location" => $location,
    "ip_address" => $ip_adress,
    "created" => $date
);

// Сохранение отзыва
$msg= $modx->newObject('rclMessage');
$msg->fromArray($data);

if ($msg->save()){
    return '{"result":"ok"}';
}
else{
    return '{"result":"error"}';
}
