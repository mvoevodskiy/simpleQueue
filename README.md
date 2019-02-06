## simpleQueue

simpleQueue is a simple extra provides queue abilities to any other extras.

SQ is provided 2 objects: 
* sqMessage for all messages
* sqLog for all actions with messages. Created automatically by all modifier processors 

## Use

The most simplier way to use is the processors.
Available processors:
* create
* update
* close
* open
* get
* getlist

Example:
```
$response = $modx->runProcessor(
    'message/update',
    array('id' => 1, 'status' => '5'),
    array('processors_path' => MODX_CORE_PATH . 'components/simplequeue/processors/');
);
```

If you want simple connect service, run once this code:
```
            $modx->addExtensionPackage('simplequeue', '[[++core_path]]components/simplequeue/model/');
```


## Copyright Information

Author: @mvoevodskiy  
simpleQueue is distributed as LGPL.