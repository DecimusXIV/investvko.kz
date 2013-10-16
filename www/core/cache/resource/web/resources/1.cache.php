<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 1,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Редактор карты',
    'longtitle' => '',
    'description' => '',
    'alias' => 'map',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 1,
    'introtext' => '',
    'content' => '<div id="editor-toolbar">
<p> </p>
</div>',
    'richtext' => 1,
    'template' => 3,
    'menuindex' => 0,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1367052074,
    'editedby' => 1,
    'editedon' => 1381568579,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 0,
    'publishedby' => 0,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 1,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'map/',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    '_content' => '<html style="height: 100%;">

    <head>
        <title>Инвестиционный портал Восточно-Казахстанской области - Редактор карты</title>
        <base href="http://investvko.kz/app/" />

        <script src="http://investvko.kz/assets/js/jquery-1.9.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://investvko.kz/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="http://investvko.kz/assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="http://investvko.kz/assets/css/leaflet/leaflet.css" />
        <script type="text/javascript" src="http://investvko.kz/assets/js/leaflet/leaflet.js"></script>
        <script type="text/javascript" src="http://investvko.kz/assets/js/leaflet/draw/leaflet.draw.js"></script>
        <link rel="stylesheet" href="http://investvko.kz/assets/css/leaflet/draw/leaflet.draw.css" />
        <script type="text/javascript" src="http://investvko.kz/assets/js/bootstrap.min.js"></script>

    </head>

    <body style="height: 100%;">
        <div id="map" style="height: 100%;"></div>

        <div class="modal hide fade" id="markerModal">
            <div class="modal-header">
                [[!getLayers]]
                

                <h3>Параметры маркера</h3>
            </div>
            <div class="modal-body">
                <p>Широта:<input type="text" id="lat" value=""></p>
                <p>Долгота:<input type="text" id="lon" value=""></p>
                <p>Слой:<input type="listbox" id="layer" value=""></p>
                <p>Тип маркера:<input type="listbox" id="type" value=""></p>
            </div>
            <div class="modal-footer">
                <a href="" class="btn" data-dismiss="modal" aria-hidden="true">Отмена</a>
                <a href="" class="btn btn-primary">Сохранить</a>
            </div>
        </div>

        <script>
            var lat = 48.807;
            var lon = 81.519;
            var zoom = 6;

            // create a map in the "map" div, set the view to a given place and zoom
            var map = L.map(\'map\').setView([lat, lon], zoom);
            
			
            // add an OpenStreetMap tile layer
            L.tileLayer(\'http://{s}.tile.osm.org/{z}/{x}/{y}.png\', {
                attribution: \'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors\'
            }).addTo(map);

            // Initialize the FeatureGroup to store editable layers
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            // Initialize the draw control and pass it the FeatureGroup of editable layers
            var drawControl = new L.Control.Draw({
                draw: {
                    polygon: false,
                    rectangle: false,
                    circle: false
                },
                edit: {
                    featureGroup: drawnItems
                }
            });

            map.on(\'draw:created\', function (e) {
				console.log(e);
                var type = e.layerType,
                        layer = e.layer;
				
				
                $("#markerModal").modal({
                    backdrop: false
                });
				$("#lat").val(layer._latlng.lat);

				
                if (type === \'marker\') {
                    layer.bindPopup(\'A popup!\');
                }

                drawnItems.addLayer(layer);
            });

            map.addControl(drawControl);
        </script>
    </body>
</html>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[*pagetitle]]' => 'Редактор карты',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
    ),
    'modSnippet' => 
    array (
      'getLayers' => 
      array (
        'fields' => 
        array (
          'id' => 54,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'getLayers',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
    return \'error Pack\';

$list = $modx->getCollection(\'MapLayer\');

$output=\'var mapLayers={};\';

foreach($list as $row){
    $row = $row->toArray();	
echo \'<pre>\';    var_dump($row);echo \'</pre>\'; 
}
return \'\';',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
    return \'error Pack\';

$list = $modx->getCollection(\'MapLayer\');

$output=\'var mapLayers={};\';

foreach($list as $row){
    $row = $row->toArray();	
echo \'<pre>\';    var_dump($row);echo \'</pre>\'; 
}
return \'\';',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);