<?php
namespace Demo\Widget;

class WidgetAbout extends WidgetAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle('About');

		$this->mainMenu->getItem(1)->addClass('active');
	}

}