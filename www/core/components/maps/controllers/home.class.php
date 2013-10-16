<?php
class MapsHomeManagerController extends MapsManagerController {
    public function process(array $scriptProperties = array()) {
 
    }
    public function getPageTitle() { return $this->modx->lexicon('maps'); }
    public function loadCustomCssJs() {
        //$this->addJavascript($this->maps->config['jsUrl'].'mgr/widgets/maps.grid.js');
    	
        
        $this->addJavascript(MODX_ASSETS_PATH.'js/json2.js');
        $this->addJavascript(MODX_ASSETS_PATH.'js/jquery-1.9.1.min.js');
        $this->addJavascript(MODX_ASSETS_PATH.'js/underscore-min.js');
        $this->addJavascript(MODX_ASSETS_PATH.'js/backbone-min.js');

        $this->addJavascript($this->maps->config['jsUrl'].'mgr/backbone/app-map-editor.js');
        

        $this->addJavascript($this->maps->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->maps->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() { return $this->maps->config['templatesPath'].'home.tpl'; }
}