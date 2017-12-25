<?php

class maximawebItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'maximawebItem';
    public $classKey = 'maximawebItem';
    public $languageTopics = ['maximaweb'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('maximaweb_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('maximaweb_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'maximawebItemCreateProcessor';