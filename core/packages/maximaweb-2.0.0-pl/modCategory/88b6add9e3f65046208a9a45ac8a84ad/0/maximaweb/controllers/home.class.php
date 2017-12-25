<?php

/**
 * The home manager controller for maximaweb.
 *
 */
class maximawebHomeManagerController extends modExtraManagerController
{
    /** @var maximaweb $maximaweb */
    public $maximaweb;


    /**
     *
     */
    public function initialize()
    {
        $this->maximaweb = $this->modx->getService('maximaweb', 'maximaweb', MODX_CORE_PATH . 'components/maximaweb/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['maximaweb:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('maximaweb');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->maximaweb->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/maximaweb.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->maximaweb->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        maximaweb.config = ' . json_encode($this->maximaweb->config) . ';
        maximaweb.config.connector_url = "' . $this->maximaweb->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "maximaweb-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="maximaweb-panel-home-div"></div>';

        return '';
    }
}