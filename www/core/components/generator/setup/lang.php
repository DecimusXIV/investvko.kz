<?php
define('MODX_API_MODE', true);

require dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/index.php';

$modx->getService('error','error.modError');

/**************************************************/
// Работа с контекстом
    function checkContext($key){
        global $modx;

        $modx->error->reset();

        $response = $modx->runProcessor('context/get', array(
            'key' => $key
        ));

        if ($response->getObject()){
            print "Контекст существует.<br>";
            return true;
        }
        else{
            print "Контекст не существует.<br>";
            return false;
        }
    }

    function addContext($key,$description){
        global $modx;

        $modx->error->reset();

        $response = $modx->runProcessor('context/create', array(
            'key' => $key,
            'description' => $description
        ));

        if($response->isError()){
            print "Произошла ошибка при создании контекста. ". $response->getMessage().'<br>';
            return false;
        }
        else{
            //$object = $response->getObject();
            print 'Контекст '.$key.' создан<br>';
            return true;
        }
    }

// Работа с настройками контекстом
    function getContextSetting($context,$key){
        global $modx;

        $modx->error->reset();

        $response = $modx->runProcessor('context/setting/get', array(
            'namespace'=> "core",
            'context_key'=>$context,
            'key'=>$key
        ));

        if ($response->getObject()){
            return $response->getObject();
        }
        else{
            return false;
        }
    }

    function addContextSetting($context,$key,$value){
        global $modx;

        $modx->error->reset();

        $response = $modx->runProcessor('context/setting/create', array(
            'namespace'=> "core",
            'fk'=>$context,
            'key'=>$key,
            'value'=>$value
        ));

        if (!$response->isError()){
            return true;
        }
        else{
            print $key.''.$response->getMessage().". Парамметр не создан<br>";
            return false;
        }
    }

    function updateContextSetting($row){
        global $modx;

        $modx->error->reset();

        $response = $modx->runProcessor('context/setting/update', $row);

        if (!$response->isError()){
            print "Обновление парамметра: ".$row['key']." успешно.<br>";
            return true;
        }
        else{
            print 'Обновление парамметра: '.$response->getMessage().".<br>";
            return false;
        }
    }
/**************************************************/
$domain='map.loc';

$params = [
			'site_url'=>'http://'.$domain.'/{context_key}/',
            'base_url'=>'/{context_key}/',
            'culterkey'=>'{context_key}',
            'site_start'=>'1',
            'error_page '=>'2',
		];

$contexts = [
				'ru'=>[
					'key'=>'ru',
					'description'=>'Русский язык',
				],
				'en'=>[
					'key'=>'en',
					'description'=>'Английский язык',
				],
				'kz'=>[
					'key'=>'kz',
					'description'=>'Казахский язык'
				],
                'web'=>[
                    'key'=>'web',
                    'description'=>'Приложение'
                ]
        	];

foreach($contexts as $key=>$row){
    echo '<b>Контекст '.$row['key'].'</b><br>';
    // если контекст еще не создан создаем его
    if (!checkContext($row['key'])){
        addContext($row['key'],$row['description']);
    }
    // Проверка настроек для каждого контекста
    foreach($params as $id=>$val){
        $val = str_replace("{context_key}",$row['key'],$val);
        $rw = getContextSetting($row['key'],$id);
        if(!$rw){
            // Добавляем парамметр для контекста
            addContextSetting($row['key'],$id,$val);
        }
        else{
            // Редактируем парамметр для контекста
            $rw['value']=$val;
            updateContextSetting($rw);
        }
    }
    echo '<hr>';
}

