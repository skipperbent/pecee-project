<?php
namespace Demo\Widget;

class WidgetHome extends WidgetAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle('Home');

		$this->mainMenu->getItem(0)->addClass('active');
	}

}