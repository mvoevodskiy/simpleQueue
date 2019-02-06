<?php

$settings = array();

$tmp = array(
	'log' => array(
		'xtype' => 'combo-boolean',
		'value' => false,
		'area' => 'simplequeue_main',
	),

);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'simplequeue_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
