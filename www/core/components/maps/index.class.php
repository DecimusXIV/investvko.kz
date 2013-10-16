<?php
require_once dirname(__FILE__) . '/model/maps/maps.class.php';
abstract class MapsManagerController extends modExtraManagerController {
    /** @var Maps $maps */
    public $maps;
    public function initialize() {
        $this->maps = new Maps($this->modx);
 
        $this->addCss($this->maps->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->maps->config['jsUrl'].'mgr/maps.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Maps.config = '.$this->modx->toJSON($this->maps->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('maps:default');
    }
    public function checkPermissions() { return true;}
}
class IndexManagerController extends MapsManagerController {
    public static function getDefaultController() { return 'home'; }
}