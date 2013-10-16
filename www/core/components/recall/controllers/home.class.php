<?php
class RecallHomeManagerController extends RecallManagerController {
    public function process(array $scriptProperties = array()) {
 
    }
    public function getPageTitle() { return $this->modx->lexicon('recall'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->recall->config['jsUrl'].'mgr/widgets/recall.grid.js');
        $this->addJavascript($this->recall->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->recall->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() { return $this->recall->config['templatesPath'].'home.tpl'; }
}