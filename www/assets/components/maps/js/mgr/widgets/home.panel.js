Maps.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+'maps.management'+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [{
                title: 'maps'
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<div id="map-top">map-top</div><div id="map">map</div><div id="map-bottom">map-bottom</div>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                }/*,{
                    xtype: 'maps-grid-maps'
                    ,cls: 'main-wrapper'
                    ,preventRender: true
                }*/]
            }]
        }]
    });
    Maps.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Maps.panel.Home,MODx.Panel);
Ext.reg('maps-panel-home',Maps.panel.Home);