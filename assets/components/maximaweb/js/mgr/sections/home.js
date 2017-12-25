maximaweb.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'maximaweb-panel-home',
            renderTo: 'maximaweb-panel-home-div'
        }]
    });
    maximaweb.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(maximaweb.page.Home, MODx.Component);
Ext.reg('maximaweb-page-home', maximaweb.page.Home);