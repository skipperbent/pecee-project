<?php
namespace Demo\Widget;

class WidgetContact extends WidgetAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle('Contact');

		$this->mainMenu->getItem(2)->addClass('active');
	}

}