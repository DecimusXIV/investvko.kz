Ext.onReady(function() {
    MODx.load({ xtype: 'recall-page-home'});
});
 
Recall.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'recall-panel-home'
            ,renderTo: 'recall-panel-home-div'
        }]
    });
    Recall.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Recall.page.Home,MODx.Component);
Ext.reg('recall-page-home',Recall.page.Home);