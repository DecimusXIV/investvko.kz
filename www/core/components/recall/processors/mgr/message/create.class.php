<?php
class rclMessageCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'rclMessage';
    public $languageTopics = array('recall:default');
    public $objectType = 'recall.rclmessage';
 
    public function beforeSave() {
        $name = $this->getProperty('fio');
 
        /*
        if (empty($name)) {
            $this->addFieldError('fio',$this->modx->lexicon('recall.rclmessage_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('fio' => $name))) {
            $this->addFieldError('fio',$this->modx->lexicon('recall.rclmessage_err_ae'));
        }
        /**/

        return parent::beforeSave();
    }
}
return 'rclMessageCreateProcessor';