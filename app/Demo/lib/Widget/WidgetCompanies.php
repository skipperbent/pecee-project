<?php
namespace Demo\Widget;

use Demo\Model\ModelCompany;

class WidgetCompanies extends WidgetAbstract {

	protected $companyId;
	protected $companies;

	public function __construct($companyId) {
		parent::__construct();

		$this->companyId = $companyId;
		$this->companies = ModelCompany::get();

		$this->prependSiteTitle('About');

		$this->mainMenu->getItem(1)->addClass('active');
	}

}