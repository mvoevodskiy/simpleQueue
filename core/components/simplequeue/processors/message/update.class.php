<?php

require_once 'sqmessageprocessor.trait.php';

/**
 * Update an Item
 */
class sqMessageUpdateProcessor extends modObjectUpdateProcessor
{
    use sqMessageProcessorTrait;

    public $objectType = 'sqMessage';
    public $classKey = 'sqMessage';
    public $languageTopics = ['simplequeue'];
    //public $permission = 'save';
    public $action = simpleQueue::SQ_UPDATE;

    public function beforeSet()
    {
        $this->unsetProperty('service');
        $this->unsetProperty('sction');
        $this->unsetProperty('subject');
        $this->unsetProperty('createdon');
        $this->unsetProperty('createdby');
        return parent::beforeSet();
    }

    /**
     * We're doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return bool|string
     */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }
}

return 'sqMessageUpdateProcessor';
