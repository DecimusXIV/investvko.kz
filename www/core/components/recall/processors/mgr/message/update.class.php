<?php
class rclMessageUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'rclMessage';
    public $languageTopics = array('recall:default');
    public $objectType = 'recall.rclmessage';
}
return 'rclMessageUpdateProcessor';