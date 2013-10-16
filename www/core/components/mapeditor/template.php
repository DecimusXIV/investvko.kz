<html style="height: 100%;">

    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />

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
            var map = L.map('map').setView([lat, lon], zoom);
            
			
            // add an OpenStreetMap tile layer
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
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

            map.on('draw:created', function (e) {
				console.log(e);
                var type = e.layerType,
                        layer = e.layer;
				
				
                $("#markerModal").modal({
                    backdrop: false
                });
				$("#lat").val(layer._latlng.lat);

				
                if (type === 'marker') {
                    layer.bindPopup('A popup!');
                }

                drawnItems.addLayer(layer);
            });

            map.addControl(drawControl);
        </script>
    </body>
</html>