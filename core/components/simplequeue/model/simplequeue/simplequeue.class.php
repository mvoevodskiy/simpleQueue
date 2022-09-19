<?php

/**
 * The base class for simpleQueue.
 */
class simpleQueue
{

    const SQ_CREATE = 'create';
    const SQ_UPDATE = 'update';
    const SQ_OPEN = 'open';
    const SQ_CLOSE = 'close';

    const SQ_LOG_BEFORE = 'before';
    const SQ_LOG_AFTER = 'after';

    /* @var modX $modx */
    public $modx;
    public $config;

    /**
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX $modx, array $config = [])
    {
        $this->modx = $modx;

        $corePath = $this->modx->getOption('simplequeue_core_path', $config,
            $this->modx->getOption('core_path') . 'components/simplequeue/');
        $assetsUrl = $this->modx->getOption('simplequeue_assets_url', $config,
            $this->modx->getOption('assets_url') . 'components/simplequeue/');
        $connectorUrl = $assetsUrl . 'connector.php';

        $this->config = array_merge([
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'connectorUrl' => $connectorUrl,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'templatesPath' => $corePath . 'elements/templates/',
            'processorsPath' => $corePath . 'processors/'
        ], $config);

        $this->modx->addPackage('simplequeue', $this->config['modelPath']);
        $this->modx->lexicon->load('simplequeue:default');
    }

    /**
     * @param string $service
     * @param string $subject
     * @param array $data
     * @return bool
     */
    public function addMessage($service = '', $subject = '', $data = [])
    {
        $result = false;

        if (!empty($service)) {
            $data['service'] = $service;
        }
        if (!empty($subject)) {
            $data['subject'] = $subject;
        }
        if (empty($data['service']) || empty($data['service'])) {
            return $result;
        }

        if ($msg = $this->modx->newObject('sqMessage', $data)) {
            if ($msg->save()) {
                $result = $msg->toArray();
            }
        }

        return $result;
    }

    /**
     * @param string $service
     * @param string $subject
     * @param bool|false $processed
     * @param array|xPDOQuery $criteria
     * @return array
     * @deprecated
     *
     */
    public function getMessages($service, $subject = '', $processed = false, $criteria = [])
    {
        $output = [];

        $criteriaArray = ['service' => $service];
        if (!empty($subject)) {
            $criteriaArray['subject'] = $subject;
        }
        if ($processed !== null) {
            $criteriaArray['processed'] = $processed;
        }
        if (is_object($criteria)) {
            $q = $criteria;
            $q->where($criteriaArray);
        } elseif (is_array($criteria)) {
            $q = $this->modx->newQuery('sqMessage');
            $q->where(array_merge($criteriaArray, $criteria));
        } else {
            $q = $this->modx->newQuery('sqMessage');
        }

        $q->select(['sqMessage.*']);
        $q->prepare();
        $q->stmt->execute();

        /** @var array $messages */
        $messages = $q->stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($messages as $msg) {
            $output[$msg['id']] = $msg;
        }

        return $output;
    }

    /**
     * @param array|int $ids
     * @return array
     */
    public function closeMessages($service, $ids = 0, $status = 0, $properties = [])
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }
        $result = [];
        foreach ($ids as $id) {
            /** @var sqMessage $msg */
            if ($msg = $this->modx->getObject('sqMessage', ['id' => $id, 'service' => $service])) {
                $msg->set('properties', array_merge($msg->get('properties'), $properties));
                $msg->set('status', $status);
                $msg->set('processed', true);
                $result[$id] = $msg->save();
            } else {
                $result[$id] = false;
            }
        }
        return $result;
    }

    /**
     * @param int $message_id
     * @param string $action
     * @param string $entry
     * @return bool
     */
    public function addLog($message_id, $action = simpleQueue::SQ_CREATE, $entry = '')
    {
        $result = false;
        $data = [
            'message_id' => $message_id,
            'user_id' => $this->modx->user->id,
            'operation' => $action,
            'entry' => $entry
        ];

        if ($log = $this->modx->newObject('sqLog', $data)) {
            $result = $log->save();
        }

        return $result;
    }
}
