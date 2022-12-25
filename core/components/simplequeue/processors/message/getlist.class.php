<?php

/**
 * Get a list of Items
 */

class sqMessageGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'message';
    public $classKey = 'sqMessage';
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    //public $permission = 'list';
    public $users = [];

    /**
     * * We're doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return boolean|string
     */
    public function beforeQuery()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $query = trim($this->getProperty('query'));
        if ($query) {
            $c->where([
                'service:LIKE' => "%{$query}%",
                'OR:action:LIKE' => "%{$query}%",
            ]);
        }

        return $c;
    }

    /**
     * @param xPDOObject $object
     *
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $array = $object->toArray();
        $array['actions'] = [];

        if (!isset($this->users[$array['createdby']])) {
            $user = $this->modx->getObject(modUser::class, ['id' => $array['createdby']]);
            if ($user) {
                $this->users[$array['createdby']] = $user->get('username');
            }
        } else {
            $this->users[$array['createdby']] = $array['createdby'];
        }

        $array['createdby'] = $this->users[$array['createdby']];

        if (!$array['processed']) {
            $array['actions'][] = [
                'cls' => '',
                'icon' => 'icon icon-power-off action-green',
                'title' => $this->modx->lexicon('simplequeue_message_enable'),
                'multiple' => $this->modx->lexicon('simplequeue_messages_enable'),
                'action' => 'messageClose',
                'button' => true,
                'menu' => true,
            ];
        } else {
            $array['actions'][] = [
                'cls' => '',
                'icon' => 'icon icon-power-off action-gray',
                'title' => $this->modx->lexicon('simplequeue_message_disable'),
                'multiple' => $this->modx->lexicon('simplequeue_messages_disable'),
                'action' => 'messageOpen',
                'button' => true,
                'menu' => true,
            ];
        }

        if ($object->finishedon === '0000-00-00 00:00:00') {
            $array['finishedon'] = 'Не завершено';
        }

        return $array;
    }
}

return 'sqMessageGetListProcessor';
