<?php
class Projects {
    public $modx;

    public $limit=15;
    public $countRows=0;

    public $config = array();
    
    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
 
        $basePath = $this->modx->getOption('projects.core_path',$config,$this->modx->getOption('core_path').'components/projects/');
        $assetsUrl = $this->modx->getOption('projects.assets_url',$config,$this->modx->getOption('assets_url').'components/projects/');
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

        $this->modx->addPackage('projects',$this->config['modelPath']);
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

        $res['page']=0;
        if ((isset($_GET['page']))&&(intval($_GET['page'])>0)){
            $res['page']=intval($_GET['page']);
        }

        $res['category']=0;
        if ((isset($_GET['category']))&&(intval($_GET['category'])>0)){
            $res['category']=intval($_GET['category']);
        }

        $res['search']='';
        if ((isset($_GET['search']))&&(strval($_GET['search'])!=null)){
            $res['search']=strval($_GET['search']);
        }

        $res['field']='id';
        if ((isset($_GET['field']))&&(strval($_GET['field'])!=null)){
            $res['field']=strval($_GET['field']);
        }

        $res['dir']='asc';
        if ((isset($_GET['dir']))&&(strval($_GET['dir'])==='desc')){
            $res['dir']='desc';
        }

        return $res;
    }

    private function newQueryProjectsListByFilter($args){
        $q=$this->modx->newQuery('prjctProject');
	
	   // Селект запроса
        $q->select(array(
            'prjctProject.*',
            'prjctCategory.name as categoryname',
            'prjctGrade.name as gradename'
        ));

        // Поиск по категории
        if ($args['category']>0){
            $q->andCondition(array(
                'category'=>$args['category']
            ));
        }

        // Поиск по совпадению
        if ($args['search']!=''){
            $q->orCondition(array(
                'name:LIKE'=>'%'.$args['search'].'%',
                'target:LIKE'=>'%'.$args['search'].'%',
                'description:LIKE'=>'%'.$args['search'].'%',
            ));
        }

	   // Left Join запроса
        $q->leftJoin('prjctCategory', 'prjctCategory' , 'prjctCategory.id = prjctProject.category');
        $q->leftJoin('prjctGrade', 'prjctGrade' , 'prjctGrade.id = prjctProject.grade');

        // Сортировка
        $q->sortby($args['field'],$args['dir']);

        return $q;
    }

    public function getProjectsListByFilter($args){

        $q=$this->newQueryProjectsListByFilter($args);

        $this->countRows = count($this->modx->getCollection('prjctProject',$q));

        $q->limit($this->limit,$args['page']*$this->limit);

        return $this->modx->getCollection('prjctProject',$q);
    }

    public function getProject($id=0){
        $q = $this->modx->newQuery('prjctProject');


        // Селект запроса
        $q->select(array(
            'prjctProject.*',
            'prjctCategory.name as categoryname',
            'prjctGrade.name as gradename'
        ));
        // Условие запроса
        $q->where(array(
            'prjctProject.id'=>$id
        ));
        // Left Join запроса
        $q->leftJoin('prjctCategory', 'prjctCategory' , 'prjctCategory.id = prjctProject.category');
        $q->leftJoin('prjctGrade', 'prjctGrade' , 'prjctGrade.id = prjctProject.grade');

        return $this->modx->getObject('prjctProject',$q);
    }

    public function getCategorybyName(){
        $q = $this->modx->newQuery('prjctCategory');
        $q->sortby('name');
        return $this->modx->getCollection('prjctCategory',$q);
    }
}
