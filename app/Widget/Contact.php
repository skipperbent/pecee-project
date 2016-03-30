<?php
namespace Demo\Widget;

class Contact extends SiteAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle(lang('Contact.Contact'));

		$this->mainMenu->getItem(2)->addClass('active');
	}

}