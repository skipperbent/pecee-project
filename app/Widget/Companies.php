<?php

namespace Demo\Widget;

use Demo\Model\Company;

class Companies extends Site
{
    protected $companyId;
    protected $companies;

    /**
     * Companies constructor.
     * @param $companyId
     * @throws \Pecee\Pixie\Exception
     */
    public function __construct($companyId)
    {
        parent::__construct();

        $this->companyId = $companyId;

        $this->companies = Company::instance()->orderBy('name', 'ASC')->all();

        $this->prependSiteTitle(lang('Companies.Companies'));

        //die(var_dump(url('companies', '')));
        $this->mainMenu->findItemByUrl(url('companies', ''))->addClass('active');
    }

}