var Recall = function(config) {
    config = config || {};
    Recall.superclass.constructor.call(this,config);
};
Ext.extend(Recall,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('recall',Recall);
Recall = new Recall();