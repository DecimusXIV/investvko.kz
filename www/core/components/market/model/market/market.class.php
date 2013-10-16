<?php
class Market {
    public $modx;

    public $limit=15;
    public $countRows=0;

    public $config = array();
    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
 
        $basePath = $this->modx->getOption('market.core_path',$config,$this->modx->getOption('core_path').'components/market/');
        $assetsUrl = $this->modx->getOption('market.assets_url',$config,$this->modx->getOption('assets_url').'components/market/');
        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            'processorsPath' => $basePath.'processors/',
            'templatesPath' => $basePath.'templates/',
            'chunksPath' => $basePath.'elements/chunks/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
        ),$config);

        $this->modx->addPackage('market',$this->config['modelPath']);
 
    }

    private function _getTplChunk($name,$postfix = '.chunk.tpl') {
        $chunk = false;
        $f = $this->config['chunksPath'].strtolower($name).$postfix;
        if (file_exists($f)) {
            $o = file_get_contents($f);
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name',$name);
            $chunk->setContent($o);
        }
        return $chunk;
    }

    public function getChunk($name,$properties = array()) {
        $chunk = null;
        if (!isset($this->chunks[$name])) {
            $chunk = $this->_getTplChunk($name);
            if (empty($chunk)) {
                $chunk = $this->modx->getObject('modChunk',array('name' => $name));
                if ($chunk == false) return false;
            }
            $this->chunks[$name] = $chunk->getContent();
        } else {
            $o = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($o);
        }
        $chunk->setCacheable(false);
        return $chunk->process($properties);
    }
    
    public function readGetFilterInput(){
        $res=array();

	$res['type']=0;
        if ((isset($_GET['type']))&&(intval($_GET['type'])>0)){
            $res['type']=intval($_GET['type']);
        }
	$res['region']=0;
        if ((isset($_GET['region']))&&(intval($_GET['region'])>0)){
            $res['region']=intval($_GET['region']);
        }
	$res['category']=0;
        if ((isset($_GET['category']))&&(intval($_GET['category'])>0)){
            $res['category']=intval($_GET['category']);
        }
		


	$res['min_price']=0;
        if ((isset($_GET['min_price']))&&(intval($_GET['min_price'])>0)){
            $res['min_price']=intval($_GET['min_price']);
        }
	$res['max_price']=0;
        if ((isset($_GET['max_price']))&&(intval($_GET['max_price'])>0)){
            $res['max_price']=intval($_GET['max_price']);
        }


        $res['page']=0;
        if ((isset($_GET['page']))&&(intval($_GET['page'])>0)){
            $res['page']=intval($_GET['page']);
        }

        $res['search']='';
        if ((isset($_GET['search']))&&(strval($_GET['search'])!=null)){
            $res['search']=strval($_GET['search']);
        }

        $res['field']='name';
        if ((isset($_GET['field']))&&(strval($_GET['field'])!=null)){
            $res['field']=strval($_GET['field']);
        }

        $res['dir']='asc';
        if ((isset($_GET['dir']))&&(strval($_GET['dir'])==='desc')){
            $res['dir']='desc';
        }

        return $res;
    }

    // Запрос для поиска объявлений
    private function newQueryAdvertsListByFilter($args){
        $q = $this->modx->newQuery('mrktAdvert');

        $q->select(array(
            'mrktAdvert.*',
            'mrktType.name as typename',
            'mrktRegion.name as regionname',
            'mrktCategory.name as categoryname'
        ));

        $q->leftJoin('mrktType', 'mrktType' , 'mrktType.id = mrktAdvert.type');
        $q->leftJoin('mrktRegion', 'mrktRegion' , 'mrktRegion.id = mrktAdvert.region');
        $q->leftJoin('mrktCategory', 'mrktCategory' , 'mrktCategory.id = mrktAdvert.category');

        if ($args['search']!=''){
            $q->where(array(
                'conracts:LIKE'=>'%'.$args['search'].'%',
                'content:LIKE'=>'%'.$args['search'].'%'
            ));
        }

	if ($args['type']>0){
		$q->andCondition(array(
			'type'=>$args['type']
		));
	}
	if ($args['region']>0){
		$q->andCondition(array(
			'region'=>$args['region']
		));
	}

	if ($args['category']>0){
		$q->andCondition(array(
			'category'=>$args['category']
		));
	}
        return $q;
    }
    // Список объявлений
    public function getAdvertsListByFilter($args){
        $q = $this->newQueryAdvertsListByFilter($args);

        $this->countRows =count($this->modx->getCollection('mrktAdvert',$q));

        $q->limit($this->limit,$this->limit*$args['page']);

        return $this->modx->getCollection('mrktAdvert',$q);
    }

    public function getListCategory(){
        $q = $this->modx->newQuery('mrktCategory');

        $q ->sortby('path');

        return $this->modx->getCollection('mrktCategory',$q);
    }

    public function getListType(){
        $q = $this->modx->newQuery('mrktType');

        $q ->sortby('name');

        return $this->modx->getCollection('mrktType',$q);
    }
    public function getListRegion(){
        $q = $this->modx->newQuery('mrktRegion');

        $q ->sortby('name');

        return $this->modx->getCollection('mrktRegion',$q);
    }

    function getAdvert($id){
        $q = $this->modx->newQuery('mrktAdvert');
        $q->select(array(
           'mrktAdvert.*',
            'mrktType.name as typename',
            'mrktRegion.name as regionname',
            'mrktCategory.name as categoryname'
        ));
        $q->where(array('id'=>$id));

        $q->leftJoin('mrktType', 'mrktType' , 'mrktType.id = mrktAdvert.type');
        $q->leftJoin('mrktRegion', 'mrktRegion' , 'mrktRegion.id = mrktAdvert.region');
        $q->leftJoin('mrktCategory', 'mrktCategory' , 'mrktCategory.id = mrktAdvert.category');

        return $this->modx->getObject('mrktAdvert',$q);
    }



}
