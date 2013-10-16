Ext.onReady(function() {
    MODx.load({ xtype: 'maps-page-home'});
    initApp();

});
 
Maps.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'maps-panel-home'
            ,renderTo: 'maps-panel-home-div'
        }]
    });
    Maps.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Maps.page.Home,MODx.Component);
Ext.reg('maps-page-home',Maps.page.Home);