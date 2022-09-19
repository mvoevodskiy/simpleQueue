<?php

$settings = [];

$tmp = [
    'log' => [
        'xtype' => 'combo-boolean',
        'value' => false,
        'area' => 'simplequeue_main',
    ],

];

foreach ($tmp as $k => $v) {
    /* @var modSystemSetting $setting */
    /** @var modX $modx */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        [
            'key' => 'simplequeue_' . $k,
            'namespace' => PKG_NAME_LOWER,
        ], $v
    ), '', true, true);

    $settings[] = $setting;
}

unset($tmp);
return $settings;
