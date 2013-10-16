<?php
// Подключение словаря компонента
$modx->getService('lexicon','modLexicon');
$modx->lexicon->load('projects:default');

// Использование сниппета для проверки
// [[!FormIt? &hooks=`NameSnippet`]]
// Чтения одного значения
// $email = $hook->getValue('email');
// Чтения всех значений
// $formFields = $hook->getValues();
// $email = $formFields['email'];
// Присвоение значения
// $hook->setValue('datestamp_submitted', $datestamp);
// Добавить сообщения об ошибке к полю 
// $hook->addError('user','User not found.');

global $isValid;

$isValid = true;

// Поля по умолчанию
$row = array(
    'created' => date("Y-m-d H:i:s"),
    'published' => '1',
);

function notEmpty($hook,$f,$s,$l=16){
    global $modx, $isValid;
    // Чтение названия поля из словаря
    $fname = $modx->lexicon('prjct.'.$f);
	// Строка пустая
	if ($s==""){
		$hook->addError($f,'Пустое значение в поле "'.$fname.'"');
		
		$isValid = false;
		return NULL;
	}
	// Строка превышает лимит
	if (strlen($s)>$l){
		$hook->addError($f,'Значение в поле "'.$fname.'" должно содержать меньше '.$l.' символов');	

		
		$isValid = false;
		return NULL;
	}
	return $s;
}

function moreZero($hook,$f,$i){
	global $modx, $isValid;
	// Чтение названия поля из словаря
	$fname = $modx->lexicon('prjct.'.$f);

	$i = intval($i);

	if (!($i>0)){
		$hook->addError($f,'Значение в поле "'.$fname.'" должно быть больше 0');
		
		$isValid = false;
		return NULL;
	}
	return $i;
}

function notZero($hook,$f,$i){
	global $modx, $isValid;
	// Чтение названия поля из словаря
	$fname = $modx->lexicon('prjct.'.$f);

	$i = intval($i);

	if (!($i!=0)){
		$hook->addError($f,'Значение в поле "'.$fname.'" не должно быть равно 0');
		
		$isValid = false;
		return NULL;
	}
	return $i;
}

function isEmail($hook, $f, $email){
	global $modx, $isValid;
	// Чтение названия поля из словаря
	$fname = $modx->lexicon('prjct.'.$f);

	// Строка пустая
	if ($email==""){
		$hook->addError($f,'Пустое значение в поле "'.$fname.'"');
		
		$isValid = false;
		return NULL;
	}

	$expression = '/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})$/iD';
	if (!((bool) preg_match($expression, (string) $email))){
		$hook->addError($f,'Пожалуйста, введите правильный адрес электронной почты.');	
		
		$isValid = false;
		return NULL;
	}
	return $email;
}

// Проверка полей
//notEmpty('',$hook->getValue(''),)

// ФИО
// строка 128 
$row['fio']=notEmpty($hook,'fio',$hook->getValue('fio'),128);//$hook->getValue('fio');
// Тип лица
// строка
$row['face']=$hook->getValue('face');
// Должность
// строка 256
$row['post']=notEmpty($hook,'post',$hook->getValue('post'),256);//$hook->getValue('post');

//Адрес
// строка 256
$row['address']=notEmpty($hook,'address',$hook->getValue('address'),256);//$hook->getValue('address');
//E-mail
// строка
$row['mail']=isEmail($hook, 'mail', $hook->getValue('mail'));//$hook->getValue('mail');
// Телефон
// строка 128
$row['phone']=notEmpty($hook,'phone',$hook->getValue('phone'),128);//$hook->getValue('phone');

// Название проекта
// строка 256
$row['name']=notEmpty($hook,'name',$hook->getValue('name'),256);//$hook->getValue('name');
// Цель проекта
// строка 600
$row['target']=notEmpty($hook,'target',$hook->getValue('target'),600);//$hook->getValue('target');
// Краткое описание проекта
// строка 128
$row['description']=notEmpty($hook,'description',$hook->getValue('description'),128);//$hook->getValue('description');
// Место реализации проекта
// строка 256
$row['place']=notEmpty($hook,'place',$hook->getValue('place'),256);//$hook->getValue('place');
// Степень проработанности
// выбор
$row['grade']=$hook->getValue('grade');
// Отрасль производства
// выбор
$row['category']=$hook->getValue('category');

// Стоимость инвестиционного проекта (в тенге)
// число
$row['cost']=moreZero($hook,'cost',$hook->getValue('cost'));//$hook->getValue('cost');
// Необходимый объем инвестиций для реализаций проекта (в тенге)
// число
$row['investment']=moreZero($hook,'investment',$hook->getValue('investment'));//$hook->getValue('investment');
// Рентабельность проекта (окупаемость (лет))
// строка 128
$row['payback']=notEmpty($hook,'payback',$hook->getValue('payback'),128);//$hook->getValue('payback');
// внутрення ставка доходности (IRR)
// число
$row['irr']=notZero($hook,'irr',$hook->getValue('irr'));//$hook->getValue('irr');
// чистая приведенная стоимость (NPV)
// число
$row['npv']=notZero($hook,'npv',$hook->getValue('npv'));//$hook->getValue('npv');
// Целевое назначение предполагаемых инвестиций
// строка 256
$row['intended_purpose']=notEmpty($hook,'intended_purpose',$hook->getValue('intended_purpose'),256);//$hook->getValue('intended_purpose');
// Количество создаваемых мест
// число
$row['jobs']=moreZero($hook,'jobs',$hook->getValue('jobs'));//$hook->getValue('jobs');

$obj = $modx->newObject('prjctProject');
$obj->fromArray($row);

// Если есть ошибки при проверке полей выводим предупреждения и возвращаем false
if (!$isValid){
	$hook->addError('message','Проверьте заполняемые поля');
	return false;
}

// Попытка сохранить полученный объект
if ($obj->save()){
	return true;		
}

// не удалось сохранить объект в базу данных
$hook->addError('message','Не предвиденная ошибка, попробуйте позже');
return false;