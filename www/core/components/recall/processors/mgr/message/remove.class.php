<?php
class rclMessageRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'rclMessage';
    public $languageTopics = array('recall:default');
    public $objectType = 'recall.rclmessage';
}
return 'rclMessageRemoveProcessor';