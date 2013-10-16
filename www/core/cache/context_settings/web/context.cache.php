<?php  return array (
  'config' => 
  array (
    'base_url' => '/app/',
    'cultureKey' => 'app',
    'error_page' => '108',
    'site_start' => '108',
    'site_url' => 'http://investvko.kz/app/',
  ),
  'resourceMap' => 
  array (
    0 => 
    array (
      0 => 1,
      1 => 105,
      2 => 108,
    ),
    1 => 
    array (
      0 => 3,
      1 => 4,
    ),
    105 => 
    array (
      0 => 106,
      1 => 107,
    ),
  ),
  'aliasMap' => 
  array (
    'map/' => 1,
    'ajax' => 105,
    'error404' => 108,
    'map/save' => 3,
    'map/setup' => 4,
    'ajax/recall' => 106,
    'ajax/market' => 107,
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBeforeDocFormSave' => 
    array (
      6 => '6',
    ),
    'OnChunkFormPrerender' => 
    array (
      2 => '2',
    ),
    'OnContextRemove' => 
    array (
      5 => '5',
    ),
    'OnDocFormPrerender' => 
    array (
      2 => '2',
      5 => '5',
    ),
    'OnDocFormSave' => 
    array (
      5 => '5',
    ),
    'OnEmptyTrash' => 
    array (
      5 => '5',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      2 => '2',
    ),
    'OnFileEditFormPrerender' => 
    array (
      2 => '2',
    ),
    'OnHandleRequest' => 
    array (
      1 => '1',
    ),
    'OnPluginFormPrerender' => 
    array (
      2 => '2',
    ),
    'OnResourceDuplicate' => 
    array (
      5 => '5',
    ),
    'OnRichTextBrowserInit' => 
    array (
      3 => '3',
    ),
    'OnRichTextEditorInit' => 
    array (
      3 => '3',
    ),
    'OnRichTextEditorRegister' => 
    array (
      3 => '3',
      2 => '2',
    ),
    'OnSnipFormPrerender' => 
    array (
      2 => '2',
    ),
    'OnTempFormPrerender' => 
    array (
      2 => '2',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => '1',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'GetWay',
      'description' => '',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => 'if($modx->context->get(\'key\') != "mgr"){
        /* grab the current langauge from the cultureKey request var */
        switch ($_REQUEST[\'cultureKey\']) {
            case \'app\':
                /* switch the context */
                $modx->switchContext(\'web\');
                break;
            case \'ru\':
                /* switch the context */
                $modx->switchContext(\'ru\');
                break;
            case \'kz\':
                /* switch the context */
                $modx->switchContext(\'kz\');
                break;
            case \'en\':
                /* switch the context */
                $modx->switchContext(\'en\');
                break;
            default:
                /* Set the default context here */
                $modx->switchContext(\'ru\');
                break;
        }
        /* unset GET var to avoid
         * appending cultureKey=xy to URLs by other components */
        unset($_GET[\'cultureKey\']);        
    }',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    2 => 
    array (
      'id' => '2',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Ace Source Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ace
 */

if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'Ace\');
    return;
}

if ($modx->getOption(\'which_element_editor\',null,\'Ace\') !== \'Ace\') {
    return;
}

$ace = $modx->getService(\'ace\',\'Ace\',$modx->getOption(\'ace.core_path\',null,$modx->getOption(\'core_path\').\'components/ace/\').\'model/ace/\');

$ace->initialize();

if ($modx->event->name == \'OnManagerPageBeforeRender\') {
    $modx->controller->addHtml(\'<style>\'."
        .x-form-textarea{
        border-radius:2px;
        position: relative;
        background-color: #fbfbfb;
        background-image: none;
        border: 1px solid;
        border-color: #CCCCCC;
        }
        .x-form-focus {
        border-color: #658F1A;
        background-color: #FFFFFF;
        }
    ".\'</style>\');
    return;
}

switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $mimeType = \'text/html\';
        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        $mimeType = \'text/html\';
        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        $field = \'modx-file-content\';
        $mimeType = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        switch (pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION))
        {
            case \'tpl\':
            case \'html\':
                $mimeType = \'text/html\';
                break;
            case \'css\':
                $mimeType = \'text/css\';
                break;
            case \'scss\':
                $mimeType = \'text/x-scss\';
                break;
            case \'less\':
                $mimeType = \'text/x-less\';
                break;
            case \'svg\':
                $mimeType = \'image/svg+xml\';
                break;
            case \'xml\':
                $mimeType = \'application/xml\';
                break;
            case \'js\':
                $mimeType = \'application/javascript\';
                break;
            case \'json\':
                $mimeType = \'application/json\';
                break;
            case \'php\':
                $mimeType = \'application/x-php\';
                break;
            case \'sql\':
                $mimeType = \'text/x-sql\';
                break;
            case \'txt\':
            default:
                $mimeType = \'text/plain\';
        }
        break;
    case \'OnDocFormPrerender\':
        if (!$modx->controller->resourceArray) {
            return;
        }
        $field = \'ta\';
        $mimeType = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');
        if ($modx->getOption(\'use_editor\')){
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if ($richText || in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\'))) {
                $field = false;
            }
        }

        break;
    default:
        return;
}

$script = "";

if ($field) {
    $script .="
    setTimeout(function(){
        var textArea = Ext.getCmp(\'$field\');
        var textEditor = MODx.load({
            xtype: \'modx-texteditor\',
            enableKeyEvents: true,
            anchor: textArea.anchor,
            width: \'auto\',
            height: textArea.height,
            name: textArea.name,
            value: textArea.getValue(),
            mimeType: \'$mimeType\'
        });

        textArea.el.dom.removeAttribute(\'name\');
        textArea.el.setStyle(\'display\', \'none\');
        textEditor.render(textArea.el.dom.parentNode);
        textEditor.on(\'keydown\', function(e){textArea.fireEvent(\'keydown\', e);});
        MODx.load({
            xtype: \'modx-treedrop\',
            target: textEditor,
            targetEl: textEditor.el,
            onInsert: (function(s){
                this.insertAtCursor(s);
                this.focus();
                return true;
            }).bind(textEditor),
            iframe: true
        });
    });";
}

if ($modx->event->name == \'OnDocFormPrerender\' && !$modx->getOption(\'use_editor\')) {
    $script .= "
    var textAreas = Ext.query(\'.modx-richtext\');
    textAreas.forEach(function(textArea){
        var htmlEditor = MODx.load({
            xtype: \'modx-texteditor\',
            width: \'auto\',
            height: parseInt(textArea.style.height) || 200,
            name: textArea.name,
            value: textArea.value,
            mimeType: \'text/html\'
        });

        textArea.name = \'\';
        textArea.style.display = \'none\';

        htmlEditor.render(textArea.parentNode);
        htmlEditor.editor.on(\'key\', function(e){ MODx.fireResourceFormChange() });
    });";
}

$modx->controller->addHtml(\'<script>Ext.onReady(function() {\' . $script . \'});</script>\');',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '1',
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
    ),
    3 => 
    array (
      'id' => '3',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'TinyMCE',
      'description' => 'TinyMCE 4.3.3-pl plugin for MODx Revolution',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * TinyMCE RichText Editor Plugin
 *
 * Events: OnRichTextEditorInit, OnRichTextEditorRegister,
 * OnBeforeManagerPageInit, OnRichTextBrowserInit
 *
 * @author Jeff Whitfield <jeff@collabpad.com>
 * @author Shaun McCormick <shaun@collabpad.com>
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package tinymce
 * @subpackage build
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'TinyMCE\');
    return;
}
require_once $modx->getOption(\'tiny.core_path\',null,$modx->getOption(\'core_path\').\'components/tinymce/\').\'tinymce.class.php\';
$tiny = new TinyMCE($modx,$scriptProperties);

$useEditor = $tiny->context->getOption(\'use_editor\',false);
$whichEditor = $tiny->context->getOption(\'which_editor\',\'\');

/* Handle event */
switch ($modx->event->name) {
    case \'OnRichTextEditorInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            unset($scriptProperties[\'chunk\']);
            if (isset($forfrontend) || $modx->context->get(\'key\') != \'mgr\') {
                $def = $tiny->context->getOption(\'cultureKey\',$tiny->context->getOption(\'manager_language\',\'en\'));
                $tiny->properties[\'language\'] = $modx->getOption(\'fe_editor_lang\',array(),$def);
                $tiny->properties[\'frontend\'] = true;
                unset($def);
            }
            /* commenting these out as it causes problems with richtext tvs */
            //if (isset($scriptProperties[\'resource\']) && !$resource->get(\'richtext\')) return;
            //if (!isset($scriptProperties[\'resource\']) && !$modx->getOption(\'richtext_default\',null,false)) return;
            $tiny->setProperties($scriptProperties);
            $html = $tiny->initialize();
            $modx->event->output($html);
            unset($html);
        }
        break;
    case \'OnRichTextBrowserInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            $inRevo20 = (boolean)version_compare($modx->version[\'full_version\'],\'2.1.0-rc1\',\'<\');
            $modx->getVersionData();
            $source = $tiny->context->getOption(\'default_media_source\',null,1);
            
            $modx->controller->addHtml(\'<script type="text/javascript">var inRevo20 = \'.($inRevo20 ? 1 : 0).\';MODx.source = "\'.$source.\'";</script>\');
            
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/tiny_mce_popup.js\');
            if (file_exists($tiny->config[\'assetsPath\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\')) {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\');
            } else {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/en.js\');
            }
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'tiny.browser.js\');
            $modx->event->output(\'Tiny.browserCallback\');
        }
        return \'\';
        break;

   default: break;
}
return;',
      'locked' => '0',
      'properties' => 'a:39:{s:22:"accessibility_warnings";a:7:{s:4:"name";s:22:"accessibility_warnings";s:4:"desc";s:315:"If this option is set to true some accessibility warnings will be presented to the user if they miss specifying that information. This option is set to true by default, since we should all try to make this world a better place for disabled people. But if you are annoyed with the warnings, set this option to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"apply_source_formatting";a:7:{s:4:"name";s:23:"apply_source_formatting";s:4:"desc";s:229:"This option enables you to tell TinyMCE to apply some source formatting to the output HTML code. With source formatting, the output HTML code is indented and formatted. Without source formatting, the output HTML is more compact. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"button_tile_map";a:7:{s:4:"name";s:15:"button_tile_map";s:4:"desc";s:338:"If this option is set to true TinyMCE will use tiled images instead of individual images for most of the editor controls. This produces faster loading time since only one GIF image needs to be loaded instead of a GIF for each individual button. This option is set to false by default since it doesn\'t work with some DOCTYPE declarations. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:7:"cleanup";a:7:{s:4:"name";s:7:"cleanup";s:4:"desc";s:331:"This option enables or disables the built-in clean up functionality. TinyMCE is equipped with powerful clean up functionality that enables you to specify what elements and attributes are allowed and how HTML contents should be generated. This option is set to true by default, but if you want to disable it you may set it to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"cleanup_on_startup";a:7:{s:4:"name";s:18:"cleanup_on_startup";s:4:"desc";s:135:"If you set this option to true, TinyMCE will perform a HTML cleanup call when the editor loads. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"convert_fonts_to_spans";a:7:{s:4:"name";s:22:"convert_fonts_to_spans";s:4:"desc";s:348:"If you set this option to true, TinyMCE will convert all font elements to span elements and generate span elements instead of font elements. This option should be used in order to get more W3C compatible code, since font elements are deprecated. How sizes get converted can be controlled by the font_size_classes and font_size_style_values options.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"convert_newlines_to_brs";a:7:{s:4:"name";s:23:"convert_newlines_to_brs";s:4:"desc";s:128:"If you set this option to true, newline characters codes get converted into br elements. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"convert_urls";a:7:{s:4:"name";s:12:"convert_urls";s:4:"desc";s:495:"This option enables you to control whether TinyMCE is to be clever and restore URLs to their original values. URLs are automatically converted (messed up) by default because the built-in browser logic works this way. There is no way to get the real URL unless you store it away. If you set this option to false it will try to keep these URLs intact. This option is set to true by default, which means URLs will be forced to be either absolute or relative depending on the state of relative_urls.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"dialog_type";a:7:{s:4:"name";s:11:"dialog_type";s:4:"desc";s:246:"This option enables you to specify how dialogs/popups should be opened. Possible values are "window" and "modal", where the window option opens a normal window and the dialog option opens a modal dialog. This option is set to "window" by default.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{i:0;s:6:"window";s:4:"text";s:6:"Window";}i:1;a:2:{i:0;s:5:"modal";s:4:"text";s:5:"Modal";}}s:5:"value";s:6:"window";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"directionality";a:7:{s:4:"name";s:14:"directionality";s:4:"desc";s:261:"This option specifies the default writing direction. Some languages (Like Hebrew, Arabic, Urdu...) write from right to left instead of left to right. The default value of this option is "ltr" but if you want to use from right to left mode specify "rtl" instead.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"ltr";s:4:"text";s:13:"Left to Right";}i:1;a:2:{s:5:"value";s:3:"rtl";s:4:"text";s:13:"Right to Left";}}s:5:"value";s:3:"ltr";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"element_format";a:7:{s:4:"name";s:14:"element_format";s:4:"desc";s:210:"This option enables control if elements should be in html or xhtml mode. xhtml is the default state for this option. This means that for example &lt;br /&gt; will be &lt;br&gt; if you set this option to "html".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:5:"xhtml";s:4:"text";s:5:"XHTML";}i:1;a:2:{s:5:"value";s:4:"html";s:4:"text";s:4:"HTML";}}s:5:"value";s:5:"xhtml";s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"entity_encoding";a:7:{s:4:"name";s:15:"entity_encoding";s:4:"desc";s:70:"This option controls how entities/characters get processed by TinyMCE.";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:5:"value";s:0:"";s:4:"text";s:4:"None";}i:1;a:2:{s:5:"value";s:5:"named";s:4:"text";s:5:"Named";}i:2;a:2:{s:5:"value";s:7:"numeric";s:4:"text";s:7:"Numeric";}i:3;a:2:{s:5:"value";s:3:"raw";s:4:"text";s:3:"Raw";}}s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"force_p_newlines";a:7:{s:4:"name";s:16:"force_p_newlines";s:4:"desc";s:147:"This option enables you to disable/enable the creation of paragraphs on return/enter in Mozilla/Firefox. The default value of this option is true. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"force_hex_style_colors";a:7:{s:4:"name";s:22:"force_hex_style_colors";s:4:"desc";s:277:"This option enables you to control TinyMCE to force the color format to use hexadecimal instead of rgb strings. It converts for example "color: rgb(255, 255, 0)" to "#FFFF00". This option is set to true by default since otherwice MSIE and Firefox would differ in this behavior.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"height";a:7:{s:4:"name";s:6:"height";s:4:"desc";s:38:"Sets the height of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"400px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"indentation";a:7:{s:4:"name";s:11:"indentation";s:4:"desc";s:139:"This option allows specification of the indentation level for indent/outdent buttons in the UI. This defaults to 30px but can be any value.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"30px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"invalid_elements";a:7:{s:4:"name";s:16:"invalid_elements";s:4:"desc";s:163:"This option should contain a comma separated list of element names to exclude from the content. Elements in this list will removed when TinyMCE executes a cleanup.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"nowrap";a:7:{s:4:"name";s:6:"nowrap";s:4:"desc";s:212:"This nowrap option enables you to control how whitespace is to be wordwrapped within the editor. This option is set to false by default, but if you enable it by setting it to true editor contents will never wrap.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"object_resizing";a:7:{s:4:"name";s:15:"object_resizing";s:4:"desc";s:148:"This option gives you the ability to turn on/off the inline resizing controls of tables and images in Firefox/Mozilla. These are enabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"path_options";a:7:{s:4:"name";s:12:"path_options";s:4:"desc";s:119:"Sets a group of options. Note: This will override the relative_urls, document_base_url and remove_script_host settings.";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:11:"docrelative";s:4:"text";s:17:"Document Relative";}i:1;a:2:{s:5:"value";s:12:"rootrelative";s:4:"text";s:13:"Root Relative";}i:2;a:2:{s:5:"value";s:11:"fullpathurl";s:4:"text";s:13:"Full Path URL";}}s:5:"value";s:11:"docrelative";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_dateFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_dateFormat";s:4:"desc";s:53:"Formatting of dates when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%Y-%m-%d";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_timeFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_timeFormat";s:4:"desc";s:53:"Formatting of times when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%H:%M:%S";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"preformatted";a:7:{s:4:"name";s:12:"preformatted";s:4:"desc";s:231:"If you enable this feature, whitespace such as tabs and spaces will be preserved. Much like the behavior of a &lt;pre&gt; element. This can be handy when integrating TinyMCE with webmail clients. This option is disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:13:"relative_urls";a:7:{s:4:"name";s:13:"relative_urls";s:4:"desc";s:231:"If this option is set to true, all URLs returned from the file manager will be relative from the specified document_base_url. If it is set to false all URLs will be converted to absolute URLs. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:17:"remove_linebreaks";a:7:{s:4:"name";s:17:"remove_linebreaks";s:4:"desc";s:531:"This option controls whether line break characters should be removed from output HTML. This option is enabled by default because there are differences between browser implementations regarding what to do with white space in the DOM. Gecko and Safari place white space in text nodes in the DOM. IE and Opera remove them from the DOM and therefore the line breaks will automatically be removed in those. This option will normalize this behavior when enabled (true) and all browsers will have a white-space-stripped DOM serialization.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"remove_script_host";a:7:{s:4:"name";s:18:"remove_script_host";s:4:"desc";s:221:"If this option is enabled the protocol and host part of the URLs returned from the file manager will be removed. This option is only used if the relative_urls option is set to false. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"remove_trailing_nbsp";a:7:{s:4:"name";s:20:"remove_trailing_nbsp";s:4:"desc";s:392:"This option enables you to specify that TinyMCE should remove any traling &nbsp; characters in block elements if you start to write inside them. Paragraphs are default padded with a &nbsp; and if you write text into such paragraphs the space will remain. Setting this option to true will remove the space. This option is set to false by default since the cursor jumps a bit in Gecko browsers.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:4:"skin";a:7:{s:4:"name";s:4:"skin";s:4:"desc";s:330:"This option enables you to specify what skin you want to use with your theme. A skin is basically a CSS file that gets loaded from the skins directory inside the theme. The advanced theme that TinyMCE comes with has two skins, these are called "default" and "o2k7". We added another skin named "cirkuit" that is chosen by default.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"cirkuit";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"skin_variant";a:7:{s:4:"name";s:12:"skin_variant";s:4:"desc";s:403:"This option enables you to specify a variant for the skin, for example "silver" or "black". "default" skin does not offer any variant, whereas "o2k7" default offers "silver" or "black" variants to the default one. For the "cirkuit" skin there\'s one variant named "silver". When creating a skin, additional variants may also be created, by adding ui_[variant_name].css files alongside the default ui.css.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"table_inline_editing";a:7:{s:4:"name";s:20:"table_inline_editing";s:4:"desc";s:231:"This option gives you the ability to turn on/off the inline table editing controls in Firefox/Mozilla. According to the TinyMCE documentation, these controls are somewhat buggy and not redesignable, so they are disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"theme_advanced_disable";a:7:{s:4:"name";s:22:"theme_advanced_disable";s:4:"desc";s:111:"This option should contain a comma separated list of controls to disable from any toolbar row/panel in TinyMCE.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:19:"theme_advanced_path";a:7:{s:4:"name";s:19:"theme_advanced_path";s:4:"desc";s:331:"This option gives you the ability to enable/disable the element path. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to "true" by default. Setting this option to "false" will effectively hide the path tool, though it still takes up room in the Status Bar.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:32:"theme_advanced_resize_horizontal";a:7:{s:4:"name";s:32:"theme_advanced_resize_horizontal";s:4:"desc";s:319:"This option gives you the ability to enable/disable the horizontal resizing. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom" and when the theme_advanced_resizing is set to true. This option is set to true by default, allowing both resizing horizontal and vertical.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"theme_advanced_resizing";a:7:{s:4:"name";s:23:"theme_advanced_resizing";s:4:"desc";s:216:"This option gives you the ability to enable/disable the resizing button. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"theme_advanced_statusbar_location";a:7:{s:4:"name";s:33:"theme_advanced_statusbar_location";s:4:"desc";s:257:"This option enables you to specify where the element statusbar with the path and resize tool should be located. This option can be set to "top" or "bottom". The default value is set to "top". This option can only be used when the theme is set to "advanced".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:6:"bottom";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"theme_advanced_toolbar_align";a:7:{s:4:"name";s:28:"theme_advanced_toolbar_align";s:4:"desc";s:187:"This option enables you to specify the alignment of the toolbar, this value can be "left", "right" or "center" (the default). This option can only be used when theme is set to "advanced".";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:6:"center";s:4:"text";s:6:"Center";}i:1;a:2:{s:5:"value";s:4:"left";s:4:"text";s:4:"Left";}i:2;a:2:{s:5:"value";s:5:"right";s:4:"text";s:5:"Right";}}s:5:"value";s:4:"left";s:7:"lexicon";N;s:4:"area";s:0:"";}s:31:"theme_advanced_toolbar_location";a:7:{s:4:"name";s:31:"theme_advanced_toolbar_location";s:4:"desc";s:191:"
This option enables you to specify where the toolbar should be located. This option can be set to "top" or "bottom" (the defualt). This option can only be used when theme is set to advanced.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:3:"top";s:7:"lexicon";N;s:4:"area";s:0:"";}s:5:"width";a:7:{s:4:"name";s:5:"width";s:4:"desc";s:32:"The width of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"95%";s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"template_selected_content_classes";a:7:{s:4:"name";s:33:"template_selected_content_classes";s:4:"desc";s:234:"Specify a list of CSS class names for the template plugin. They must be separated by spaces. Any template element with one of the specified CSS classes will have its content replaced by the selected editor content when first inserted.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    5 => 
    array (
      'id' => '5',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Babel',
      'description' => 'Links and synchronizes multilingual resources.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Babel
 *
 * Copyright 2010 by Jakob Class <jakob.class@class-zec.de>
 *
 * This file is part of Babel.
 *
 * Babel is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Babel is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Babel; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package babel
 */
/**
 * Babel Plugin to link and synchronize multilingual resources
 * 
 * Based on ideas of Sylvain Aerni <enzyms@gmail.com>
 *
 * Events:
 * OnDocFormPrerender,OnDocFormSave,OnEmptyTrash,OnContextRemove,OnResourceDuplicate
 *
 * @author Jakob Class <jakob.class@class-zec.de>
 *
 * @package babel
 * 
 */

$babel = $modx->getService(\'babel\',\'Babel\',$modx->getOption(\'babel.core_path\',null,$modx->getOption(\'core_path\').\'components/babel/\').\'model/babel/\',$scriptProperties);

if (!($babel instanceof Babel)) return;

/* be sure babel TV is loaded */
if(!$babel->babelTv) return;

switch ($modx->event->name) {
	case \'OnDocFormPrerender\':
		$output = \'\';
		$errorMessage = \'\';
		$resource =& $modx->event->params[\'resource\'];
		if(!$resource) {
			/* a new resource is being to created
			 * -> skip rendering the babel box */
			break;
		}
		$contextKeys = $babel->getGroupContextKeys($resource->get(\'context_key\'));
		$currentContextKey = $resource->get(\'context_key\');
		$linkedResources = $babel->getLinkedResources($resource->get(\'id\'));
		if(empty($linkedResources)) {
			/* always be sure that the Babel TV is set */
			$babel->initBabelTv($resource);
		}
		
		/* grab manager actions IDs */
		$actions = $modx->request->getAllActionIDs();
		
		if(isset($_POST[\'babel-context-key\'])) {
			/* one of the following babel actions has been performed: link, unlink or translate */
			try {
				$contextKey = $_POST[\'babel-context-key\'];
				/* check if context is valid */
				$context = $modx->getObject(\'modContext\', array(\'key\' => $contextKey));
				if(!$context) {
					$errorParameter = array(\'context\' => $contextKey);
					throw new Exception(\'error.invalid_context_key\');
				}
				
				/* manuallly add or change a translation link */
				if(isset($_POST[\'babel-link\'])) {
					if($linkedResources[$contextKey] == $_POST[\'babel-link-target\']) {
						/* target resource is equal to current resource -> nothing to do */
						throw new Exception();
					}
					$targetResource = $modx->getObject(\'modResource\', intval($_POST[\'babel-link-target\']));
					if(!$targetResource) {
						/* error: resource id is not valid */
						$errorParameter = array(\'resource\' => htmlentities($_POST[\'babel-link-target\']));
						throw new Exception(\'error.invalid_resource_id\');
					}
					if($targetResource->get(\'context_key\') != $contextKey) {
						/* error: resource id of another context has been provided */
						$errorParameter = array(
							\'resource\' => $targetResource->get(\'id\'),
							\'context\' => $contextKey);
						throw new Exception(\'error.resource_from_other_context\');
					}
					$targetLinkedResources = $babel->getLinkedResources($targetResource->get(\'id\'));
					if(count($targetLinkedResources) > 1) {
						/* error: target resource is already linked with other resources */
						$errorParameter = array(\'resource\' => $targetResource->get(\'id\'));
						throw new Exception(\'error.resource_already_linked\');
					}
					/* add or change a translation link */
					if(isset($linkedResources[$contextKey])) {
						/* existing link has been changed:
						 * -> reset Babel TV of old resource */
						$babel->initBabelTvById($linkedResources[$contextKey]);
					}
					
					$linkedResources[$contextKey] = $targetResource->get(\'id\');
					$babel->updateBabelTv($linkedResources, $linkedResources);
					
					/* copy values of synchronized TVs to target resource */
					if(isset($_POST[\'babel-link-copy-tvs\']) && intval($_POST[\'babel-link-copy-tvs\']) == 1) {
						$babel->sychronizeTvs($resource->get(\'id\'));
					}
				}
				
				/* remove an existing translation link */
				if(isset($_POST[\'babel-unlink\'])) {
					if(!isset($linkedResources[$contextKey])) {
						/* error: there is no link for this context */
						$errorParameter = array(\'context\' => $contextKey);
						throw new Exception(\'error.no_link_to_context\');
					}
					if($linkedResources[$contextKey] == $resource->get(\'id\')) {
						/* error: (current) resource can not be unlinked from it\'s translations */
						$errorParameter = array(\'context\' => $contextKey);
						throw new Exception(\'error.unlink_of_selflink_not_possible\');
					}					
					$unlinkedResource = $modx->getObject(\'modResource\', intval($linkedResources[$contextKey]));
					if(!$unlinkedResource) {
						/* error: invalid resource id */
						$errorParameter = array(\'resource\' => htmlentities($linkedResources[$contextKey]));
						throw new Exception(\'error.invalid_resource_id\');
					}
					if($unlinkedResource->get(\'context_key\') != $contextKey) {
						/* error: resource is of a another context */
						$errorParameter = array(
							\'resource\' => $targetResource->get(\'id\'),
							\'context\' => $contextKey);
						throw new Exception(\'error.resource_from_other_context\');
					}
					/* unlink resource and reset its Babel TV */
					$babel->initBabelTv($unlinkedResource);
					unset($linkedResources[$contextKey]);
					$babel->updateBabelTv($linkedResources, $linkedResources);
						
				}
				
				/* create an new resource an add a translation link */
				if(isset($_POST[\'babel-translate\'])) {
					if($currentContextKey == $contextKey) {
						/* error: translation should be created in the same context */
						throw new Exception(\'error.translation_in_same_context\');
					}
					if(isset($linkedResources[$contextKey])) {
						/* error: there does already exist a translation */
						$errorParameter = array(\'context\' => $contextKey);
						throw new Exception(\'error.translation_already_exists\');
					}
										
					$newResource = $babel->duplicateResource($resource, $contextKey);
					if($newResource) {										
						$linkedResources[$contextKey] = $newResource->get(\'id\');
						$babel->updateBabelTv($linkedResources, $linkedResources);
					} else {
						/* error: translation could not be created */
						$errorParameter = array(\'context\' => $contextKey);
						throw new Exception(\'error.could_not_create_translation\');
					}
					/* redirect to new resource */
					$url = $modx->getOption(\'manager_url\',null,MODX_MANAGER_URL).\'?a=\'.$actions[\'resource/update\'].\'&id=\'.$newResource->get(\'id\');
					$modx->sendRedirect(rtrim($url,\'/\'),\'\',\'\',\'full\');
				}
			} catch (Exception $exception) {
				$errorKey = $exception->getMessage();
				if($errorKey) {
					if(!is_array($errorParameter)) {
						$errorParameter = array();
					}
					$errorMessage = \'<div id="babel-error">\'.$modx->lexicon($errorKey,$errorParameter).\'</div>\';
				}
			}

		}
		
		/* create babel-box with links to translations */
		$linkedResources = $babel->getLinkedResources($resource->get(\'id\'));
		$outputLanguageItems = \'\';
		foreach($contextKeys as $contextKey) {
			/* for each (valid/existing) context of the context group a button will be displayed */
			$context = $modx->getObject(\'modContext\', array(\'key\' => $contextKey));
			if(!$context) {
				$modx->log(modX::LOG_LEVEL_ERROR, \'Could not load context: \'.$contextKey);
				continue;
			}
			$context->prepare();
			$cultureKey = $context->getOption(\'cultureKey\',$modx->getOption(\'cultureKey\'));
			/* url to which the form will post it\'s data */
			$formUrl = \'?a=\'.$actions[\'resource/update\'].\'&amp;id=\'.$resource->get(\'id\');
			if(isset($linkedResources[$contextKey])) {
				/* link to this context has been set */
				if($linkedResources[$contextKey] == $resource->get(\'id\')) {
					/* don\'t show language layer for current resource */
					$showLayer = \'\';
				} else {
					$showLayer = \'yes\';
				}
				$showTranslateButton = \'\';
				$showUnlinkButton = \'yes\';
				$showSecondRow = \'\';
				$resourceId = $linkedResources[$contextKey];
				$resourceUrl = \'?a=\'.$actions[\'resource/update\'].\'&amp;id=\'.$resourceId;
				if($resourceId == $resource->get(\'id\')) {
					$className = \'selected\';
				} else {
					$className = \'\';
				}
				
			} else {
				/* link to this context has not been set yet:
				 * -> show button to create translation */
				$showLayer = \'yes\';
				$showTranslateButton = \'yes\';
				$showUnlinkButton = \'\';
				$showSecondRow = \'yes\';
				$resourceId = \'\';
				$resourceUrl = \'#\';
				$className = \'notset\';
			}
			$placeholders = array(
				\'formUrl\' => $formUrl,
				\'contextKey\' => $contextKey,
				\'cultureKey\' => $cultureKey,
				\'resourceId\' => $resourceId,
				\'resourceUrl\' => $resourceUrl,
				\'className\' => $className,
				\'showLayer\' => $showLayer,
				\'showTranslateButton\' => $showTranslateButton,
				\'showUnlinkButton\' => $showUnlinkButton,
				\'showSecondRow\' => $showSecondRow,
			);
			$outputLanguageItems .= $babel->getChunk(\'mgr/babelBoxItem\', $placeholders);
		}
		
		$output .= \'<div id="babel-box">\'.$errorMessage.$outputLanguageItems.\'</div>\';
		$modx->event->output($output);
		
		/* include CSS */
		$modx->regClientCSS($babel->config[\'cssUrl\'].\'babel.css?v=6\');
		$modx->regClientStartupScript($babel->config[\'jsUrl\'].\'babel.js?v=3\');
		break;
	
	case \'OnDocFormSave\':
		$resource =& $modx->event->params[\'resource\'];
		if(!$resource) {
			$modx->log(modX::LOG_LEVEL_ERROR, \'No resource provided for OnDocFormSave event\');
			break;
		}
		if($modx->event->params[\'mode\'] == modSystemEvent::MODE_NEW) {
			/* no TV synchronization for new resources, just init Babel TV */
			$babel->initBabelTv($resource);
			break;
		}
		$babel->sychronizeTvs($resource->get(\'id\'));
		break;
		
	case \'OnEmptyTrash\':
		/* remove translation links to non-existing resources */
		$deletedResourceIds =& $modx->event->params[\'ids\'];
		if(is_array($deletedResourceIds)) {
			foreach ($deletedResourceIds as $deletedResourceId) {
				$babel->removeLanguageLinksToResource($deletedResourceId);
			}
		}		
		break;
		
	case \'OnContextRemove\':
		/* remove translation links to non-existing contexts */
		$context =& $modx->event->params[\'context\'];
		if($context) {
			$babel->removeLanguageLinksToContext($context->get(\'key\'));
		}
		break;
	
	case \'OnResourceDuplicate\':
		/* init Babel TV of duplicated resources */
		$resource =& $modx->event->params[\'newResource\'];
		$babel->initBabelTv($resource);
		break;
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'imgTinyMCE',
      'description' => '',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '$content = $resource->get(\'content\'); /* Вытягиваем контент. */
$content = str_replace(\'src="../assets/images/\',\'src="/assets/images/\',$content);
$resource->set(\'content\', $content); /* Устанавливаем значение Описания. */',
      'locked' => '1',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'web' => 
      array (
        0 => 
        array (
          'principal' => 0,
          'authority' => 9999,
          'policy' => 
          array (
            'load' => true,
          ),
        ),
        1 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
          ),
        ),
      ),
    ),
  ),
);