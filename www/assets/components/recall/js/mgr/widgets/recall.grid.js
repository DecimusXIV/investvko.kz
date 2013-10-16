Recall.grid.Recall = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'recall-grid-recall'
        ,url: Recall.config.connectorUrl
        ,baseParams: { action: 'mgr/message/getList' }
        ,fields: ['id','fio','content','mail','created','menu']
        ,paging: true
        ,remoteSort: true
        ,anchor: '97%'
/*
        ,save_action: 'mgr/message/updateFromGrid'
        ,autosave: true
/**/
        ,autoExpandColumn: 'created'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: _('recall.mail')
            ,dataIndex: 'mail'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('recall.fio')
            ,dataIndex: 'fio'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('recall.content')
            ,dataIndex: 'content'
            ,sortable: false
            ,width: 350
            ,editor: { xtype: 'textfield' }
        },{
            header: _('recall.created')
            ,dataIndex: 'created'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },]
        ,tbar:[{
            xtype: 'textfield'
            ,id: 'recall-search-filter'
            ,emptyText: _('recall.search...')
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
        ,getMenu: function() {
            return [{
                text: _('recall.rclmessage_update')
                ,handler: this.updaterclMessage
            },'-',{
                text: _('recall.rclmessage_remove')
                ,handler: this.removerclMessage
            }];
        }
        ,updaterclMessage: function(btn,e) {
            if (!this.updaterclMessageWindow) {
                this.updaterclMessageWindow = MODx.load({
                    xtype: 'recall-window-rclmessage-update'
                    ,record: this.menu.record
                    ,listeners: {
                        'success': {fn:this.refresh,scope:this}
                    }
                });
            }
            this.updaterclMessageWindow.setValues(this.menu.record);
            this.updaterclMessageWindow.show(e.target);
        }
        ,removerclMessage: function() {
            MODx.msg.confirm({
                title: _('recall.rclmessage_remove')
                ,text: _('recall.rclmessage_remove_confirm')
                ,url: this.config.url
                ,params: {
                    action: 'mgr/message/remove'
                    ,id: this.menu.record.id
                }
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
    });
    Recall.grid.Recall.superclass.constructor.call(this,config)
};
Ext.extend(Recall.grid.Recall,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('recall-grid-recall',Recall.grid.Recall);



Recall.window.UpdaterclMessage = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('recall.rclmessage_update')
        ,url: Recall.config.connectorUrl
        ,baseParams: {
            action: 'mgr/message/update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('recall.fio')
            ,name: 'fio'
            ,anchor: '100%'
        },{
            xtype: 'textarea'
            ,fieldLabel: _('recall.content')
            ,name: 'content'
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('recall.location')
            ,name: 'location'
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('recall.created')
            ,name: 'created'
            ,anchor: '100%'
        }]
    });
    Recall.window.UpdaterclMessage.superclass.constructor.call(this,config);
};
Ext.extend(Recall.window.UpdaterclMessage,MODx.Window);
Ext.reg('recall-window-rclmessage-update',Recall.window.UpdaterclMessage);
