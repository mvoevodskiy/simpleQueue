<?php

/**
 * Get an Item
 */
class simpleQueueItemGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'message';
    public $classKey = 'sqMessage';
    public $languageTopics = ['simplequeue:default'];
    //public $permission = 'view';

    /**
     * We're doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return mixed
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }
}

return 'simpleQueueItemGetProcessor';
