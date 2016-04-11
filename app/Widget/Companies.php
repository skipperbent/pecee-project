<?php
namespace Demo\Widget;

use Demo\Model\ModelCompany;

class Companies extends SiteAbstract {

	protected $companyId;
	protected $companies;

	public function __construct($companyId) {
		parent::__construct();

		$this->companyId = $companyId;

		$modelCompany = new ModelCompany();

		$this->companies = $modelCompany->all();

		$this->prependSiteTitle(lang('Companies.Companies'));

		$this->mainMenu->getItem(1)->addClass('active');
	}

}