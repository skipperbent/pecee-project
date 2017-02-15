<?php
namespace Demo\Widget;

use Demo\Model\Company;

class Companies extends Site
{
    protected $companyId;
    protected $companies;

    public function __construct($companyId)
    {
        parent::__construct();

        $this->companyId = $companyId;

        $this->companies = Company::instance()->orderBy('name', 'ASC')->all();

        $this->prependSiteTitle(lang('Companies.Companies'));

        $this->mainMenu->getItem(1)->addClass('active');
    }

}