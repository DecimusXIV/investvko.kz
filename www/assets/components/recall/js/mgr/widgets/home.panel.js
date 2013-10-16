Recall.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('recall.management')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [{
                title: _('recall')
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('recall.management_desc')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'recall-grid-recall'
                    ,cls: 'main-wrapper'
                    ,preventRender: true
                }]
            }]
            // only to redo the grid layout after the content is rendered
            // to fix overflow components' panels, especially when scroll bar is shown up
            ,listeners: {
                'afterrender': function(tabPanel) {
                    tabPanel.doLayout();
                }
            }
        }]
    });
    Recall.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Recall.panel.Home,MODx.Panel);
Ext.reg('recall-panel-home',Recall.panel.Home);