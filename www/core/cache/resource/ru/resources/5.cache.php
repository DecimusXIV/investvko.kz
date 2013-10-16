<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 5,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Карта',
    'longtitle' => '',
    'description' => '',
    'alias' => 'map',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polylinejd.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polylineway.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polygonKz.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polygonRegions.js"></script>

<script type="text/template" id="template-style-control911">
             <div  class="control-layer">
                <div class="layer-title">
                    <span class="control-active"><input type="checkbox" class="layer-checkbox" data-id="{!id!}"/></span>
                    <span class="control-title" data-id="{!id!}">{!title!}</span>
                    <span class="control-listdown" data-id="{!id!}">&nbsp;</span>
                </div>
                <div class="layer-container" data-id="{!id!}"></div>
            </div>
</script>

<script type="text/template" id="template-style-control">
             <div  class="control-layer">
                <div class="layer-title" data-id="{!id!}">
                    <table width="100%">
                        <col width="25">
                        <col width="">
                        <col width="40">
                        <tr>
                            <td class="control-active"><input type="checkbox" class="layer-checkbox" data-id="{!id!}"/></td>
                            <td class="control-title" data-id="{!id!}">{!title!}</td>
                            <td class="control-listdown" data-id="{!id!}"><span>&nbsp;</span></td>
                        </tr>
                    </table>
                </div>
                <div class="layer-container" data-id="{!id!}"></div>
            </div>
</script>
<script type="text/template" id="template-style-control-row">
<div class="style-title" style="min-height:30px;">
    <table>
        <tr>
            <td class="control-active"><input type="checkbox" class="style-checkbox" data-id="{!id!}" for-id="{!layer_id!}"/></td>
            <td class="control-img"><img src="{!img!}"/></td>
            <td class="control-title" data-id="{!id!}">{!title!}</td>
        </tr>
    </table>
</div>
</script>

<div id="sidebar"><div>
    <div id="sidebar-container-top">
        <div id="logotip">
            <table height="100%">
                <col width="70">
                <col width="">

                <tr>
                    <td style="vertical-align:middle;" align="center"><img src="http://investvko.kz/assets/images/map/logo.png"/></td>
                    <td style="font-weight:700;font-size:85%;vertical-align:middle;text-aling:center;text-decoration:underline;">Инвестиционный <br>портал<br> Восточно-Казахстанской области</td>
                </tr>
            </table>            
        </div>
        <div id="link-back">
            <a href="[[++site_url]]">
            <table>
                <col width="70">
                <col width="">
                <tr>
                    <td  align="center"><img src="http://investvko.kz/assets/images/map/arrow.png"/></td>
                    <td style="font-weight:700;font-size:85%;text-decoration:underline;">Вернуться на сайт</td>
                </tr>
            </table>            
            </a>
        </div>
    </div>
    <div id="sidebar-container">
        <div id="layerlist">
        <!--
            <div  class="control-layer" data-id="1">
                <div class="layer-title">
                    <span class="control-active"><input type="checkbox" class="layer-checkbox" data-id="1"/></span>
                    <span class="control-title" data-id="1">title</span>
                    <span class="control-listdown" data-id="1">+</span>
                </div>
                <div class="layer-container" data-id="1">
                    <div class="style-title">
                        <span class="control-active"><input type="checkbox" class="style-checkbox" data-id="1" for-id="1"/></span>
                        <span class="control-title" data-id="1">title</span>
                    </div>                    
                </div>  
            </div>
        -->
        </div>
    </div>
    <div id="sidebar-container-footer">
        <table width="100%" height="100%" cellspacing=0 cellpadding=0>
            <col width="35"/>
            <tr>
                <td><input id="controlCenterLabel" type="checkbox" name="controlCenterLabel" checked/></td>
                <td style="color:#fff;text-decoration:underline;">Показывать название районных центров</td>
            </tr>
        </table>
    </div>
</div></div>

<div id="modal-block" >
    <div class="block-title">Заголовок</div>
    <div class="block-content"></div>
    <div class="block-link" align="right"><a href=\'#\'>Подробнее</a></div>
</div>

<div id="map">&nbsp;</div>

    <script type="text/javascript" >
        var replaceAll=function(find, replace_to,where){
            return where.replace(new RegExp(find, "g"), replace_to);
        };

        [[!getMapIcons]]
        [[!getMapStyles]]


        var  App = {};
        App.Config={};
        App.Config.mapWidth=700;
        App.Config.mapHeight=700;

        App.Config.showCenterLabel = true;








        var clusters=[];
        var containerLayer = $("#layerlist");
        var containerMap = $("#map");
        var resizeMap = function (){
            var t = document.body.clientHeight;
            var h = (( t > App.Config.mapHeight ) ? t : App.Config.mapHeight)
            var t = document.body.clientWidth-250;
            var w = (( t > App.Config.mapWidth ) ? t : App.Config.mapWidth)
            containerMap.css("height",h);
            containerMap.css("width",w);
            $("#sidebar-container").css("height",h-225);
            $("#sidebar").css("height",h);
        };
        resizeMap();

        var map = L.map(\'map\',{minZoom:5}).setView([48.004625, 66.643066], 5);

        // Отрисовка на карте территории казахстана
        var i,c;
        for (var i = polygonKazahstan.length - 1; i >= 0; i--) {
            c = polygonKazahstan[i,0];
            polygonKazahstan[i,0]=polygonKazahstan[i,1];
            polygonKazahstan[i,1]=c;
        };
        var plnKz = L.polygon(polygonKazahstan,mapStyles[1]);

        // Отрисовка районов и районных центров

        
        // подсказка для мыши
        var customTooltipText = {text:"Наведите на любой интерактивный объект для получения информации"}
        var mouseTooltip =new L.Tooltip(map);
        mouseTooltip.updateContent(customTooltipText).powerOff();
                

        var mapPopup = L.popup();
        //.setLatLng([51.5, -0.09])
        //.setContent("I am a standalone popup.")
        //.openOn(map);
        var openMapPopup = function (geometry,content){
            mapPopup.setLatLng(geometry)
            .setContent(content)
            .openOn(map);
        }   

        // Слои для районов
        var layersRegions = L.layerGroup();
        // Слои для районных центров
        var layersRegionsCenter = L.layerGroup();
        $.each(mapRegions,function(id,row){
            // Отрисовка района
            var poly = L.polygon(row.geometry,mapStyles[1]);
            poly.on({
                        mouseover: function(e){
                            e.target.setStyle({"fillOpacity":"0.5","weight":3});
                            mouseTooltip.updateContent({text:row.title}).powerOn();
                        },
                        mouseout: function(e){
                            e.target.setStyle({"fillOpacity":"0.1","weight":1});
                            mouseTooltip.powerOff();
                        },
                        click: function(e){
                            map.fitBounds(e.target.getBounds());
                        }
                    });
            poly.setStyle({"color":"#AE64AC","opacity":"0.7","weight":1,"fillColor":"orange","fillOpacity":"0.1"});

            layersRegions.addLayer(poly);
            // Отрисовка районного центра
            var mcenter = L.marker(row.centerGeometry,{icon:row.icon})
                            .addTo(map)
                            .bindLabel(row.centerTitle, { noHide: true, translucent: true}).showLabel();
            layersRegionsCenter.addLayer(mcenter);
        });

        //map.addLayer(layersRegionsCenter);
        var hideCenterLabel = function(){
            layersRegionsCenter.eachLayer(function (mcenter) {
                mcenter.hideLabel();            
            });
        }
        var showCenterLabel = function(){
            layersRegionsCenter.eachLayer(function (mcenter) {
                mcenter.showLabel();            
            });
        }

        

        // Отрисовка слоев
        [[!getMapLayersArray]]

        // containerLayer
        var addToListLayer=function(layer){
            var res = $("#template-style-control").html();
            res = replaceAll("{!id!}",layer.id,res);
            res = res.replace("{!title!}",layer.title);
            containerLayer.append(res);
        };
        var addStyleToListLayer=function(layer,id,title,img){
            var res = $("#template-style-control-row").html();
            res = replaceAll("{!layer_id!}",layer,res);
            res = replaceAll("{!id!}",id,res);
            res = res.replace("{!title!}",title);
            res = res.replace("{!img!}",img);
            containerLayer.find(".layer-container[data-id="+layer+"]:first").append(res);
        };
        $.each(mapLayers,function(key,row){
            addToListLayer(row);
        });


        // Отрисовка объектов
        [[!getMapObjectsArray]]
        var mapCluster={};
        $.each(mapObjects,function(key,row){
            if (row[\'type\']==="marker"){
                if(mapCluster[row.style]){
                    mapCluster[row.style] = mapCluster[row.style];
                }
                else{
                    mapCluster[row.style] = {
                                                id:row.id
                                                ,layer_id:row.layer
                                                ,cluster:L.markerClusterGroup({ 
                                                    showCoverageOnHover: false
                                                    ,animateAddingMarkers : false 
                                                    ,iconCreateFunction : function(cluster){
                                                        var childCount = cluster.getChildCount();

                                                        var imgUrl = mapIcons[row.style]["options"]["iconUrl"];
                                                        var clusterTempate = \'<div><div class="marker-cluster-count"><span>\' + childCount + \'</span></div><div class="marker-cluster-img"><img src="\'+imgUrl+\'"></div></div>\';
                                                        return new L.DivIcon({ html: clusterTempate, className: \'marker-cluster\', iconSize: new L.Point(20, 20) });
                                                    }
                                                })
                                    };
                    
                    addStyleToListLayer(row.layer,row.style,mapIconsName[row.style],mapIcons[row.style]["options"]["iconUrl"]);                
                }
                var mrk = new L.marker(row.geometry,{icon:mapIcons[row.style]});
                var text ="";
                if (row.style<100){
                    text="<b>Месторождение: </b>"+row.title+"<br/><b>Расположение: </b>"
                }
                
                mrk.on("click",function(){

                    openMapPopup(row.geometry,text+row.message);
                });
                mapCluster[row.style]["cluster"].addLayer(mrk);
            }
            if (row.type==="polygon"){
            }
        });

        var mapBaseLayer = L.tileLayer("http://tile.openstreetmap.org/{z}/{x}/{y}.png", {maxZoom: 18}).addTo(map);
        /*
        L.marker([51.5, -0.09]).addTo(map)
                .bindLabel("ffdsafs", { noHide: true, translucent: true}).showLabel()
                .bindPopup("<b>Hello world!</b><br />I am a popup.");
        /**/
        var mapLayers={};
        var layersGD = L.layerGroup();
        $.each(lineGD,function(key,row){
            L.polyline(row.geometry,styleGD).addTo(layersGD);
        });
        mapLayers["4"] = layersGD;

        var layersWay = L.layerGroup();
        $.each(lineWay,function(key,row){
            L.polyline(row.geometry,styleWay).addTo(layersWay);
        });
        mapLayers["3"] = layersWay;


        // Анимация при первом входе
        mapBaseLayer.on("load",function(){
            setTimeout(function(){
                map.setView([48.68733411186308,81.58447265624999],7);
            },500);
            mapBaseLayer.off("load");
        });
        // Действие при изменении масштаба
        map.on("zoomend",function(){ 
            var zoom = map.getZoom();
            switch (true){
                case (zoom<6):
                    map.addLayer(plnKz);

                    map.removeLayer(layersRegions);

                    if(App.Config.showCenterLabel){
                        hideCenterLabel();
                    }
                break
                case (zoom<11):
                    map.removeLayer(plnKz);

                    map.addLayer(layersRegions);

                    if(App.Config.showCenterLabel){
                        showCenterLabel();
                    }
                break
                default:
                    map.removeLayer(plnKz);
                    map.removeLayer(layersRegions);
            }
        });

        var clickLayerControl=function(id,b){
            var l = $("input.style-checkbox[for-id="+id+"]");
            if(b){
                l=l.filter("[checked]");
            }
            else{
                l=l.filter(":not([checked])");
            }
            l.click();
        };
        var clickStyleControl=function(layer,id,b){
            var el= $("input.layer-checkbox[data-id="+id+"]");
            if (el.checked){
                el.attr("checked","checked");
            }
            else{
                el.removeAttr("checked");
            }
            var l = $(".layer-container[data-id="+id+"] input.style-checkbox:checked").length;
            if (l>0){
                el[0].checked=true;
            }
            else{
                el[0].checked=false;
            }
        };

        (function(){
            $(document).ready(function(){
                // Измение размера карты
                $(window).resize(resizeMap);

                resizeMap();

                $.each(mapCluster,function(i,row){
                    //row["cluster"].addTo(map);
                })
                
                // $("input:checkbox").attr("checked","checked");
                // $("input:checkbox").removeAttr("checked"); 
                
                $(".layer-container .control-title[data-id]").on("click",function(e){
                    var id = $(e.currentTarget).attr("data-id");
                    $("input.style-checkbox[data-id="+id+"]").click();
                });

                $("input.layer-checkbox").on("click",function(e){
                    var el = $(e.currentTarget);
                    var id = el.attr("data-id");

                    var layer = (mapLayers[id]?mapLayers[id]:0);

                    if (e.currentTarget.checked){
                        //e.currentTarget.checked =false;
                        clickLayerControl(id,false);
                        //clickStyleControl(id,layer,true);
                        if (layer){mapLayers[id].addTo(map);}
                    }
                    else{
                        clickLayerControl(id,true);
                        //e.currentTarget.checked =true;
                        //clickStyleControl(id,layer,false);
                        if (layer){map.removeLayer(mapLayers[id]);}
                    }
                });
                $("input.style-checkbox").on("click",function(e){
                    var el = $(e.currentTarget);
                    var layer = el.attr("for-id");
                    var id = el.attr("data-id");
                    
                    if (e.currentTarget.checked){
                        el.attr("checked","checked");
                        //e.currentTarget.checked =false;
                        mapCluster[id]["cluster"].addTo(map);
                        clickStyleControl(id,layer,true);
                    }
                    else{
                        el.removeAttr("checked");
                        map.removeLayer(mapCluster[id]["cluster"]);
                        //e.currentTarget.checked =true;
                        clickStyleControl(id,layer,false);
                    }
                });

                $("#controlCenterLabel").on("change",function(e,el){
                    App.Config.showCenterLabel = e.currentTarget.checked;
                    if (!App.Config.showCenterLabel){
                        hideCenterLabel();
                    }
                    else if (map.getZoom()>5){
                        showCenterLabel();
                    }
                })

                $(".layer-container").hide();
                
                $(".control-listdown").on("click",function(e){
                    var el = $(e.currentTarget);
                    var id = el.attr("data-id");
                    if (el.attr("checked")){
                        el.removeAttr("checked");

                        $(".layer-title[data-id="+id+"]").removeClass("active");
                        
                        el.removeClass("active");
                        $(".layer-container[data-id="+id+"]").hide();
                    }
                    else{
                        el.attr("checked","checked");

                        $(".layer-title[data-id="+id+"]").addClass("active");
                        el.addClass("active");
                        $(".layer-container[data-id="+id+"]").show();
                        
                    }
                });
                var funcMap = function (e){console.log(e.latlng.lat+" "+e.latlng.lng)};
                map.on("click",funcMap);
            });
        })(jQuery);
    </script>',
    'richtext' => 0,
    'template' => 4,
    'menuindex' => 1,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1368502732,
    'editedby' => 1,
    'editedon' => 1378301581,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1368502680,
    'publishedby' => 1,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'ru',
    'content_type' => 1,
    'uri' => 'map',
    'uri_override' => 1,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    '_content' => '<html>
<head>
    <meta charset="utf-8">
    <title>Инвестиционный портал Восточно-Казахстанской области - Карта</title>
    <base href="http://investvko.kz/ru/" />
    
     <script type="text/javascript" src="http://investvko.kz/assets/js/backbone/json2.js"></script>
     <script src="http://investvko.kz/assets/js/jquery-1.9.1.min.js"></script>
     
     <!-- Подключение backbone -->
     <script type="text/javascript" src="http://investvko.kz/assets/js/backbone/underscore-min.js"></script>
     <script type="text/javascript" src="http://investvko.kz/assets/js/backbone/backbone-min.js"></script>
        
     <!-- Подключение leaflet.js -->
     <link rel="stylesheet" href="http://investvko.kz/assets/css/leaflet/leaflet.css" />
     <!--[if lte IE 8]><link rel="stylesheet" href="http://investvko.kz/assets/css/leaflet/leaflet.ie.css" /><![endif]-->
     <script type="text/javascript" src="http://investvko.kz/assets/js/leaflet/leaflet.js"></script>

     <!-- Подключение лэйблов -->
     <link rel="stylesheet"  href="http://investvko.kz/assets/css/leaflet/label/leaflet.label.css">
     <script src="http://investvko.kz/assets/js/leaflet/label/Label.js"></script>
     <script src="http://investvko.kz/assets/js/leaflet/label/Marker.Label.js"></script>
     <script src="http://investvko.kz/assets/js/leaflet/label/Map.Label.js"></script>
        
     <!-- Подсказка возле мыши -->
     <link rel="stylesheet"  href="http://investvko.kz/assets/css/leaflet/tooltip/leaflet.tooltip.css">
     <script src="http://investvko.kz/assets/js/leaflet/tooltip/Tooltip.js"></script>
    
     <!-- Кластеры для маркеров -->
     <link rel="stylesheet"  href="http://investvko.kz/assets/css/leaflet/markercluster/MarkerCluster.css">
     <link rel="stylesheet"  href="http://investvko.kz/assets/css/leaflet/markercluster/MarkerCluster.Default.css">
     <script src="http://investvko.kz/assets/js/leaflet/markercluster/leaflet.markercluster.js"></script>
     
     <!-- Основной стиль карты -->
     <link rel="stylesheet" href="http://investvko.kz/assets/css/map.css">
</head>
<body>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polylinejd.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polylineway.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polygonKz.js"></script>
<script type="text/javascript" src="http://investvko.kz/assets/js/geometry/polygonRegions.js"></script>

<script type="text/template" id="template-style-control911">
             <div  class="control-layer">
                <div class="layer-title">
                    <span class="control-active"><input type="checkbox" class="layer-checkbox" data-id="{!id!}"/></span>
                    <span class="control-title" data-id="{!id!}">{!title!}</span>
                    <span class="control-listdown" data-id="{!id!}">&nbsp;</span>
                </div>
                <div class="layer-container" data-id="{!id!}"></div>
            </div>
</script>

<script type="text/template" id="template-style-control">
             <div  class="control-layer">
                <div class="layer-title" data-id="{!id!}">
                    <table width="100%">
                        <col width="25">
                        <col width="">
                        <col width="40">
                        <tr>
                            <td class="control-active"><input type="checkbox" class="layer-checkbox" data-id="{!id!}"/></td>
                            <td class="control-title" data-id="{!id!}">{!title!}</td>
                            <td class="control-listdown" data-id="{!id!}"><span>&nbsp;</span></td>
                        </tr>
                    </table>
                </div>
                <div class="layer-container" data-id="{!id!}"></div>
            </div>
</script>
<script type="text/template" id="template-style-control-row">
<div class="style-title" style="min-height:30px;">
    <table>
        <tr>
            <td class="control-active"><input type="checkbox" class="style-checkbox" data-id="{!id!}" for-id="{!layer_id!}"/></td>
            <td class="control-img"><img src="{!img!}"/></td>
            <td class="control-title" data-id="{!id!}">{!title!}</td>
        </tr>
    </table>
</div>
</script>

<div id="sidebar"><div>
    <div id="sidebar-container-top">
        <div id="logotip">
            <table height="100%">
                <col width="70">
                <col width="">

                <tr>
                    <td style="vertical-align:middle;" align="center"><img src="http://investvko.kz/assets/images/map/logo.png"/></td>
                    <td style="font-weight:700;font-size:85%;vertical-align:middle;text-aling:center;text-decoration:underline;">Инвестиционный <br>портал<br> Восточно-Казахстанской области</td>
                </tr>
            </table>            
        </div>
        <div id="link-back">
            <a href="http://investvko.kz/ru/">
            <table>
                <col width="70">
                <col width="">
                <tr>
                    <td  align="center"><img src="http://investvko.kz/assets/images/map/arrow.png"/></td>
                    <td style="font-weight:700;font-size:85%;text-decoration:underline;">Вернуться на сайт</td>
                </tr>
            </table>            
            </a>
        </div>
    </div>
    <div id="sidebar-container">
        <div id="layerlist">
        <!--
            <div  class="control-layer" data-id="1">
                <div class="layer-title">
                    <span class="control-active"><input type="checkbox" class="layer-checkbox" data-id="1"/></span>
                    <span class="control-title" data-id="1">title</span>
                    <span class="control-listdown" data-id="1">+</span>
                </div>
                <div class="layer-container" data-id="1">
                    <div class="style-title">
                        <span class="control-active"><input type="checkbox" class="style-checkbox" data-id="1" for-id="1"/></span>
                        <span class="control-title" data-id="1">title</span>
                    </div>                    
                </div>  
            </div>
        -->
        </div>
    </div>
    <div id="sidebar-container-footer">
        <table width="100%" height="100%" cellspacing=0 cellpadding=0>
            <col width="35"/>
            <tr>
                <td><input id="controlCenterLabel" type="checkbox" name="controlCenterLabel" checked/></td>
                <td style="color:#fff;text-decoration:underline;">Показывать название районных центров</td>
            </tr>
        </table>
    </div>
</div></div>

<div id="modal-block" >
    <div class="block-title">Заголовок</div>
    <div class="block-content"></div>
    <div class="block-link" align="right"><a href=\'#\'>Подробнее</a></div>
</div>

<div id="map">&nbsp;</div>

    <script type="text/javascript" >
        var replaceAll=function(find, replace_to,where){
            return where.replace(new RegExp(find, "g"), replace_to);
        };

        [[!getMapIcons]]
        [[!getMapStyles]]


        var  App = {};
        App.Config={};
        App.Config.mapWidth=700;
        App.Config.mapHeight=700;

        App.Config.showCenterLabel = true;








        var clusters=[];
        var containerLayer = $("#layerlist");
        var containerMap = $("#map");
        var resizeMap = function (){
            var t = document.body.clientHeight;
            var h = (( t > App.Config.mapHeight ) ? t : App.Config.mapHeight)
            var t = document.body.clientWidth-250;
            var w = (( t > App.Config.mapWidth ) ? t : App.Config.mapWidth)
            containerMap.css("height",h);
            containerMap.css("width",w);
            $("#sidebar-container").css("height",h-225);
            $("#sidebar").css("height",h);
        };
        resizeMap();

        var map = L.map(\'map\',{minZoom:5}).setView([48.004625, 66.643066], 5);

        // Отрисовка на карте территории казахстана
        var i,c;
        for (var i = polygonKazahstan.length - 1; i >= 0; i--) {
            c = polygonKazahstan[i,0];
            polygonKazahstan[i,0]=polygonKazahstan[i,1];
            polygonKazahstan[i,1]=c;
        };
        var plnKz = L.polygon(polygonKazahstan,mapStyles[1]);

        // Отрисовка районов и районных центров

        
        // подсказка для мыши
        var customTooltipText = {text:"Наведите на любой интерактивный объект для получения информации"}
        var mouseTooltip =new L.Tooltip(map);
        mouseTooltip.updateContent(customTooltipText).powerOff();
                

        var mapPopup = L.popup();
        //.setLatLng([51.5, -0.09])
        //.setContent("I am a standalone popup.")
        //.openOn(map);
        var openMapPopup = function (geometry,content){
            mapPopup.setLatLng(geometry)
            .setContent(content)
            .openOn(map);
        }   

        // Слои для районов
        var layersRegions = L.layerGroup();
        // Слои для районных центров
        var layersRegionsCenter = L.layerGroup();
        $.each(mapRegions,function(id,row){
            // Отрисовка района
            var poly = L.polygon(row.geometry,mapStyles[1]);
            poly.on({
                        mouseover: function(e){
                            e.target.setStyle({"fillOpacity":"0.5","weight":3});
                            mouseTooltip.updateContent({text:row.title}).powerOn();
                        },
                        mouseout: function(e){
                            e.target.setStyle({"fillOpacity":"0.1","weight":1});
                            mouseTooltip.powerOff();
                        },
                        click: function(e){
                            map.fitBounds(e.target.getBounds());
                        }
                    });
            poly.setStyle({"color":"#AE64AC","opacity":"0.7","weight":1,"fillColor":"orange","fillOpacity":"0.1"});

            layersRegions.addLayer(poly);
            // Отрисовка районного центра
            var mcenter = L.marker(row.centerGeometry,{icon:row.icon})
                            .addTo(map)
                            .bindLabel(row.centerTitle, { noHide: true, translucent: true}).showLabel();
            layersRegionsCenter.addLayer(mcenter);
        });

        //map.addLayer(layersRegionsCenter);
        var hideCenterLabel = function(){
            layersRegionsCenter.eachLayer(function (mcenter) {
                mcenter.hideLabel();            
            });
        }
        var showCenterLabel = function(){
            layersRegionsCenter.eachLayer(function (mcenter) {
                mcenter.showLabel();            
            });
        }

        

        // Отрисовка слоев
        [[!getMapLayersArray]]

        // containerLayer
        var addToListLayer=function(layer){
            var res = $("#template-style-control").html();
            res = replaceAll("{!id!}",layer.id,res);
            res = res.replace("{!title!}",layer.title);
            containerLayer.append(res);
        };
        var addStyleToListLayer=function(layer,id,title,img){
            var res = $("#template-style-control-row").html();
            res = replaceAll("{!layer_id!}",layer,res);
            res = replaceAll("{!id!}",id,res);
            res = res.replace("{!title!}",title);
            res = res.replace("{!img!}",img);
            containerLayer.find(".layer-container[data-id="+layer+"]:first").append(res);
        };
        $.each(mapLayers,function(key,row){
            addToListLayer(row);
        });


        // Отрисовка объектов
        [[!getMapObjectsArray]]
        var mapCluster={};
        $.each(mapObjects,function(key,row){
            if (row[\'type\']==="marker"){
                if(mapCluster[row.style]){
                    mapCluster[row.style] = mapCluster[row.style];
                }
                else{
                    mapCluster[row.style] = {
                                                id:row.id
                                                ,layer_id:row.layer
                                                ,cluster:L.markerClusterGroup({ 
                                                    showCoverageOnHover: false
                                                    ,animateAddingMarkers : false 
                                                    ,iconCreateFunction : function(cluster){
                                                        var childCount = cluster.getChildCount();

                                                        var imgUrl = mapIcons[row.style]["options"]["iconUrl"];
                                                        var clusterTempate = \'<div><div class="marker-cluster-count"><span>\' + childCount + \'</span></div><div class="marker-cluster-img"><img src="\'+imgUrl+\'"></div></div>\';
                                                        return new L.DivIcon({ html: clusterTempate, className: \'marker-cluster\', iconSize: new L.Point(20, 20) });
                                                    }
                                                })
                                    };
                    
                    addStyleToListLayer(row.layer,row.style,mapIconsName[row.style],mapIcons[row.style]["options"]["iconUrl"]);                
                }
                var mrk = new L.marker(row.geometry,{icon:mapIcons[row.style]});
                var text ="";
                if (row.style<100){
                    text="<b>Месторождение: </b>"+row.title+"<br/><b>Расположение: </b>"
                }
                
                mrk.on("click",function(){

                    openMapPopup(row.geometry,text+row.message);
                });
                mapCluster[row.style]["cluster"].addLayer(mrk);
            }
            if (row.type==="polygon"){
            }
        });

        var mapBaseLayer = L.tileLayer("http://tile.openstreetmap.org/{z}/{x}/{y}.png", {maxZoom: 18}).addTo(map);
        /*
        L.marker([51.5, -0.09]).addTo(map)
                .bindLabel("ffdsafs", { noHide: true, translucent: true}).showLabel()
                .bindPopup("<b>Hello world!</b><br />I am a popup.");
        /**/
        var mapLayers={};
        var layersGD = L.layerGroup();
        $.each(lineGD,function(key,row){
            L.polyline(row.geometry,styleGD).addTo(layersGD);
        });
        mapLayers["4"] = layersGD;

        var layersWay = L.layerGroup();
        $.each(lineWay,function(key,row){
            L.polyline(row.geometry,styleWay).addTo(layersWay);
        });
        mapLayers["3"] = layersWay;


        // Анимация при первом входе
        mapBaseLayer.on("load",function(){
            setTimeout(function(){
                map.setView([48.68733411186308,81.58447265624999],7);
            },500);
            mapBaseLayer.off("load");
        });
        // Действие при изменении масштаба
        map.on("zoomend",function(){ 
            var zoom = map.getZoom();
            switch (true){
                case (zoom<6):
                    map.addLayer(plnKz);

                    map.removeLayer(layersRegions);

                    if(App.Config.showCenterLabel){
                        hideCenterLabel();
                    }
                break
                case (zoom<11):
                    map.removeLayer(plnKz);

                    map.addLayer(layersRegions);

                    if(App.Config.showCenterLabel){
                        showCenterLabel();
                    }
                break
                default:
                    map.removeLayer(plnKz);
                    map.removeLayer(layersRegions);
            }
        });

        var clickLayerControl=function(id,b){
            var l = $("input.style-checkbox[for-id="+id+"]");
            if(b){
                l=l.filter("[checked]");
            }
            else{
                l=l.filter(":not([checked])");
            }
            l.click();
        };
        var clickStyleControl=function(layer,id,b){
            var el= $("input.layer-checkbox[data-id="+id+"]");
            if (el.checked){
                el.attr("checked","checked");
            }
            else{
                el.removeAttr("checked");
            }
            var l = $(".layer-container[data-id="+id+"] input.style-checkbox:checked").length;
            if (l>0){
                el[0].checked=true;
            }
            else{
                el[0].checked=false;
            }
        };

        (function(){
            $(document).ready(function(){
                // Измение размера карты
                $(window).resize(resizeMap);

                resizeMap();

                $.each(mapCluster,function(i,row){
                    //row["cluster"].addTo(map);
                })
                
                // $("input:checkbox").attr("checked","checked");
                // $("input:checkbox").removeAttr("checked"); 
                
                $(".layer-container .control-title[data-id]").on("click",function(e){
                    var id = $(e.currentTarget).attr("data-id");
                    $("input.style-checkbox[data-id="+id+"]").click();
                });

                $("input.layer-checkbox").on("click",function(e){
                    var el = $(e.currentTarget);
                    var id = el.attr("data-id");

                    var layer = (mapLayers[id]?mapLayers[id]:0);

                    if (e.currentTarget.checked){
                        //e.currentTarget.checked =false;
                        clickLayerControl(id,false);
                        //clickStyleControl(id,layer,true);
                        if (layer){mapLayers[id].addTo(map);}
                    }
                    else{
                        clickLayerControl(id,true);
                        //e.currentTarget.checked =true;
                        //clickStyleControl(id,layer,false);
                        if (layer){map.removeLayer(mapLayers[id]);}
                    }
                });
                $("input.style-checkbox").on("click",function(e){
                    var el = $(e.currentTarget);
                    var layer = el.attr("for-id");
                    var id = el.attr("data-id");
                    
                    if (e.currentTarget.checked){
                        el.attr("checked","checked");
                        //e.currentTarget.checked =false;
                        mapCluster[id]["cluster"].addTo(map);
                        clickStyleControl(id,layer,true);
                    }
                    else{
                        el.removeAttr("checked");
                        map.removeLayer(mapCluster[id]["cluster"]);
                        //e.currentTarget.checked =true;
                        clickStyleControl(id,layer,false);
                    }
                });

                $("#controlCenterLabel").on("change",function(e,el){
                    App.Config.showCenterLabel = e.currentTarget.checked;
                    if (!App.Config.showCenterLabel){
                        hideCenterLabel();
                    }
                    else if (map.getZoom()>5){
                        showCenterLabel();
                    }
                })

                $(".layer-container").hide();
                
                $(".control-listdown").on("click",function(e){
                    var el = $(e.currentTarget);
                    var id = el.attr("data-id");
                    if (el.attr("checked")){
                        el.removeAttr("checked");

                        $(".layer-title[data-id="+id+"]").removeClass("active");
                        
                        el.removeClass("active");
                        $(".layer-container[data-id="+id+"]").hide();
                    }
                    else{
                        el.attr("checked","checked");

                        $(".layer-title[data-id="+id+"]").addClass("active");
                        el.addClass("active");
                        $(".layer-container[data-id="+id+"]").show();
                        
                    }
                });
                var funcMap = function (e){console.log(e.latlng.lat+" "+e.latlng.lng)};
                map.on("click",funcMap);
            });
        })(jQuery);
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
    '[[*pagetitle]]' => 'Карта',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
    ),
    'modSnippet' => 
    array (
      'getMapIcons' => 
      array (
        'fields' => 
        array (
          'id' => 4,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'getMapIcons',
          'description' => '',
          'editor_type' => 0,
          'category' => 1,
          'cache_type' => 0,
          'snippet' => '$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
	return \'error Pack\';

$list = $modx->getCollection(\'MapIcon\');

$output=\'var mapIcons=[];var mapIconsName=[];\';
$s=\'\';
foreach($list as $row){
	$row = $row->toArray();
	$output .=\'mapIcons[\'.$row[\'id\'].\'] = L.icon({\'.$row[\'Gist\'].\'});\';
    $s.=\'mapIconsName[\'.$row[\'id\'].\']="\'.$row[\'Title\'].\'";\';
}

return $output.$s;',
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

$list = $modx->getCollection(\'MapIcon\');

$output=\'var mapIcons=[];var mapIconsName=[];\';
$s=\'\';
foreach($list as $row){
	$row = $row->toArray();
	$output .=\'mapIcons[\'.$row[\'id\'].\'] = L.icon({\'.$row[\'Gist\'].\'});\';
    $s.=\'mapIconsName[\'.$row[\'id\'].\']="\'.$row[\'Title\'].\'";\';
}

return $output.$s;',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
      'getMapStyles' => 
      array (
        'fields' => 
        array (
          'id' => 8,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'getMapStyles',
          'description' => '',
          'editor_type' => 0,
          'category' => 1,
          'cache_type' => 0,
          'snippet' => '$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
    return \'error Pack\';

$list = $modx->getCollection(\'MapStyle\');

$output=\'var mapStyles=[];\';

foreach($list as $row){
	$row = $row->toArray();
	$output .=\'mapStyles[\'.$row[\'id\'].\'] ={\'.$row[\'Description\'].\'};\';
}

return $output;',
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

$list = $modx->getCollection(\'MapStyle\');

$output=\'var mapStyles=[];\';

foreach($list as $row){
	$row = $row->toArray();
	$output .=\'mapStyles[\'.$row[\'id\'].\'] ={\'.$row[\'Description\'].\'};\';
}

return $output;',
        ),
        'policies' => 
        array (
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
      'getMapLayersArray' => 
      array (
        'fields' => 
        array (
          'id' => 43,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'getMapLayersArray',
          'description' => '',
          'editor_type' => 0,
          'category' => 1,
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
	$output .=\'mapLayers["\'.$row[\'id\'].\'"] = {id:\'.$row[\'id\'].\',title:"\'.$row[\'Title\'].\'"};\';
}

return $output;',
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
	$output .=\'mapLayers["\'.$row[\'id\'].\'"] = {id:\'.$row[\'id\'].\',title:"\'.$row[\'Title\'].\'"};\';
}

return $output;',
        ),
        'policies' => 
        array (
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
      'getMapObjectsArray' => 
      array (
        'fields' => 
        array (
          'id' => 44,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'getMapObjectsArray',
          'description' => '',
          'editor_type' => 0,
          'category' => 1,
          'cache_type' => 0,
          'snippet' => '$defaultMapsCorePath = $modx->getOption(\'core_path\').\'components/maps/\';
$mapsCorePath = $modx->getOption(\'maps.core_path\',null,$defaultMapsCorePath);
$proj = $modx->getService(\'maps\',\'Maps\',$mapsCorePath.\'model/maps/\',$scriptProperties);

if (!($proj instanceof Maps)) 
    return \'error Pack\';

$list = $modx->getCollection(\'MapObject\');

if (count($list)==0)
	return \'alert("Нет объектов для отображения")\';

$output=\'var mapObjects={};\';

foreach($list as $row){
	$row = $row->toArray();
    $title = htmlspecialchars($row[\'Title\']);
    $msg = $row[\'Message\'];
	if ($row[\'Type\']==\'marker\'){
        $output .=\'mapObjects["\'.$row[\'id\'].\'"]={
            id:"\'.$row[\'id\'].\'"
            ,layer:"\'.$row[\'LayerId\'].\'"
            ,style:"\'.$row[\'IconId\'].\'"
            ,type:"marker"
            ,title:"\'.$title.\'"
            ,message:"\'.$msg.\'"
            ,geometry:[\'.$row[\'Geometry\'].\']
            };\';
	}
    elseif($row[\'Type\']==\'polygon\'){
    
        $output .=\'mapObjects["\'.$row[\'id\'].\'"]={
                id:"\'.$row[\'id\'].\'"
                ,layer:"\'.$row[\'LayerId\'].\'"
                ,style:"\'.$row[\'IconId\'].\'"
                ,type:"polygon"
                ,message:"\'.$msg.\'"
                };\';
            /**/
    }
}
return $output;',
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

$list = $modx->getCollection(\'MapObject\');

if (count($list)==0)
	return \'alert("Нет объектов для отображения")\';

$output=\'var mapObjects={};\';

foreach($list as $row){
	$row = $row->toArray();
    $title = htmlspecialchars($row[\'Title\']);
    $msg = $row[\'Message\'];
	if ($row[\'Type\']==\'marker\'){
        $output .=\'mapObjects["\'.$row[\'id\'].\'"]={
            id:"\'.$row[\'id\'].\'"
            ,layer:"\'.$row[\'LayerId\'].\'"
            ,style:"\'.$row[\'IconId\'].\'"
            ,type:"marker"
            ,title:"\'.$title.\'"
            ,message:"\'.$msg.\'"
            ,geometry:[\'.$row[\'Geometry\'].\']
            };\';
	}
    elseif($row[\'Type\']==\'polygon\'){
    
        $output .=\'mapObjects["\'.$row[\'id\'].\'"]={
                id:"\'.$row[\'id\'].\'"
                ,layer:"\'.$row[\'LayerId\'].\'"
                ,style:"\'.$row[\'IconId\'].\'"
                ,type:"polygon"
                ,message:"\'.$msg.\'"
                };\';
            /**/
    }
}
return $output;',
        ),
        'policies' => 
        array (
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
    ),
  ),
);