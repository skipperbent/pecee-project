<?php
namespace Demo\Widget;

use Demo\Model\ModelCompany;

class Home extends SiteAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle(lang('Home.Home'));

		$this->mainMenu->getItem(0)->addClass('active');

		ModelCompany::get();
	}

}