maximaweb.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'maximaweb-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('maximaweb') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('maximaweb_items'),
                layout: 'anchor',
                items: [{
                    html: _('maximaweb_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'maximaweb-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    maximaweb.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(maximaweb.panel.Home, MODx.Panel);
Ext.reg('maximaweb-panel-home', maximaweb.panel.Home);
