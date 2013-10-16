var Maps = function(config) {
    config = config || {};
    Maps.superclass.constructor.call(this,config);
};
Ext.extend(Maps,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('maps',Maps);
Maps = new Maps();
