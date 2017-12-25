var maximaweb = function (config) {
    config = config || {};
    maximaweb.superclass.constructor.call(this, config);
};
Ext.extend(maximaweb, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('maximaweb', maximaweb);

maximaweb = new maximaweb();