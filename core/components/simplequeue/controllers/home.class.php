<?php

/**
 * The home manager controller for simpleQueue.
 *
 */
class simpleQueueHomeManagerController extends simpleQueueMainController {
	/* @var simpleQueue $simpleQueue */
	public $simpleQueue;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('simplequeue');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->simpleQueue->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->simpleQueue->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->simpleQueue->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->simpleQueue->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->simpleQueue->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->simpleQueue->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->simpleQueue->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "simplequeue-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->simpleQueue->config['templatesPath'] . 'home.tpl';
	}
}