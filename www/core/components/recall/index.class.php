<?php
require_once dirname(__FILE__) . '/model/recall/recall.class.php';
abstract class RecallManagerController extends modExtraManagerController {
    /** @var Recall $recall */
    public $recall;
    public function initialize() {
        $this->recall = new Recall($this->modx);
 
        $this->addCss($this->recall->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->recall->config['jsUrl'].'mgr/recall.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Recall.config = '.$this->modx->toJSON($this->recall->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('recall:default');
    }
    public function checkPermissions() { return true;}
}
class IndexManagerController extends RecallManagerController {
    public static function getDefaultController() { return 'home'; }
}