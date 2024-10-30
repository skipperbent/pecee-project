<?php

namespace Demo\Widget;

use Demo\Model\Company;
use Pecee\Model\Collections\ModelCollection;

class Companies extends Site
{
    protected ?int $companyId;
    protected ModelCollection $companies;

    /**
     * Companies constructor.
     * @param int|null $companyId
     * @throws \Pecee\Pixie\Exception
     */
    public function __construct(?int $companyId = null)
    {
        parent::__construct();

        $this->companyId = $companyId;
    }

    protected function onLoad(): void
    {
        $this->companies = Company::instance()->orderBy('name', 'ASC')->all();
        $this->prependSiteTitle(lang('Companies.Companies'));
    }

}