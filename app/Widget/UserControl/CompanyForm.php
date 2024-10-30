<?php

namespace Demo\Widget\UserControl;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;

class CompanyForm extends UserControl
{
    protected Company $company;

    protected ?int $companyId;

    public function __construct(?int $companyId = null)
    {
        $this->companyId = $companyId;
    }

    protected function onLoad(): void
    {
        $this->company = Company::instance()->where('id', '=', $this->companyId)->firstOrNew();

        /* Set site title */
        $siteTitle = $this->company->exists() ? lang('Companies.EditCompany', $this->company->name) : lang('Companies.AddCompany');
        $this->prependSiteTitle($siteTitle);

        /* Set input names */
        $this->setInputName([
            'name' => lang('Companies.Name'),
        ]);

        if ($this->isPostBack()) {

            $this->validate([
                'name' => [new NotNullOrEmpty()],
            ]);

            if ($this->hasErrors() === false) {

                $this->company->save([
                    'name' => input('name'),
                    'ip' => request()->getIp(),
                ]);

                $this->setMessage(
                    lang($this->company->exists() ? 'Companies.CompanyUpdated' : 'Companies.CompanySaved'),
                    'success'
                );

                response()->refresh();

            }

            response()->refresh();
        }
    }

}