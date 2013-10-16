<?php

/* Получение методов объекта */
// $a = get_class_methods ( $response);print_r($a);
//var_dump($response->getMany());


require_once dirname(dirname(dirname(dirname(__FILE__)))).'/core/config/config.inc.php';
include_once MODX_CORE_PATH . 'model/modx/modx.class.php';

// Подключаем
define('MODX_API_MODE', true);
require dirname(dirname(dirname(dirname(__FILE__)))).'/index.php';

// Включаем обработку ошибок

$modx->getService('error','error.modError');
/*

$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
/**/

$params = [
			'base_url'=>'http://map.loc'
		];

$setup = [
			'contexts'=>[
				'ru'=>[
					'key'=>'ru',
					'description'=>'Русский язык',
					'context_ssetting'=>[
					]
				],
				'en'=>[
					'key'=>'en',
					'description'=>'Английский язык',
					'context_ssetting'=>[
					]
				],
				'kz'=>[
					'key'=>'kz',
					'description'=>'Казахский язык',
					'context_ssetting'=>[
					]
				]
			],
	];


/*
    public function __construct(  ) {
        $modx = new modX();
        $modx->initialize('web');
        $modx->getService('error', 'error.modError');

        $this->modx = $modx;
    }
*/

/*
        public function checkContext($key){
           $modx = $this->modx;
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
*/

/*
        public function addContext($key,$description){
            if ($this->checkContext($key)) return false;
            echo 'fdas';
            $modx = $this->modx;

            $response = $modx->runProcessor('context/create', array(
                'key' => $key,
                'description' => $description
            ));

            if($response->isError()){
                print "Произошла ошибка при создании контекста. ". $response->getMessage().'<br>';
                return false;
            }
            else{
                $object = $response->getObject();
                print 'Контекст '.$key.' создан<br>';

                return true;
            }
        }
*/

function getContext($key){
    global $modx;
    $modx->getService('error','error.modError');

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
    $modx->getService('error','error.modError');

    $response = $modx->runProcessor('context/create', array(
        'key' => $key,
        'description' => $description
    ));

    $modx->error->reset();

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

$modx->error->reset();

/*
 * Добавление настройки контекста
 *//*
$response = $modx->runProcessor('context/setting/create', array(
    'namespace'=> "core",
    'fk'=>'ru',
    'key'=>'rufdsa2',
    'name'=>'ru',
    'value'=>'ru'
));
/**/



