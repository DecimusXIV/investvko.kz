<?php
function elements_modplugin_1($scriptProperties= array()) {
global $modx;
if (is_array($scriptProperties)) {
extract($scriptProperties, EXTR_SKIP);
}
if($modx->context->get('key') != "mgr"){
        /* grab the current langauge from the cultureKey request var */
        switch ($_REQUEST['cultureKey']) {
            case 'app':
                /* switch the context */
                $modx->switchContext('web');
                break;
            case 'ru':
                /* switch the context */
                $modx->switchContext('ru');
                break;
            case 'kz':
                /* switch the context */
                $modx->switchContext('kz');
                break;
            case 'en':
                /* switch the context */
                $modx->switchContext('en');
                break;
            default:
                /* Set the default context here */
                $modx->switchContext('ru');
                break;
        }
        /* unset GET var to avoid
         * appending cultureKey=xy to URLs by other components */
        unset($_GET['cultureKey']);        
    }
}
