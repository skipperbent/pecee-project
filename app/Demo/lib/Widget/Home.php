<?php
namespace Demo\Widget;

class Home extends SiteAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle(lang('Home.Home'));

		$this->mainMenu->getItem(0)->addClass('active');
	}

}