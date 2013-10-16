<?php
class rclMessageGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'rclMessage';
    public $languageTopics = array('recall:default');
    public $defaultSortField = 'fio';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'recall.rclmessage';
    
    public function prepareQueryBeforeCount(xPDOQuery $c) {
    $query = $this->getProperty('query');
    if (!empty($query)) {
        $c->where(array(
            'fio:LIKE' => '%'.$query.'%',
            'OR:content:LIKE' => '%'.$query.'%',
        ));
    }
    return $c;
}
}
return 'rclMessageGetListProcessor';