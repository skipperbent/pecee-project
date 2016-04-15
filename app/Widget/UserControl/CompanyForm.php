<?php

namespace Demo\Widget\UserControl;

use Demo\CustomValidation\ValidateInputNotNullOrEmpty;
use Demo\Model\ModelCompany;
use Demo\Widget\SiteAbstract;

class CompanyForm extends SiteAbstract {

    protected $company;

    public function __construct($companyId = null) {
        parent::__construct();

        $this->setTemplate(null);

        if($companyId !== null) {

            $this->company = ModelCompany::find($companyId);

            if($this->company !== null) {
                $this->prependSiteTitle(lang('Companies.EditCompany', $this->company->name));
            }
        } else {
            $this->prependSiteTitle(lang('Companies.AddCompany'));
        }

        if($this->isPostBack()) {

            $this->validate([
                'name' => [ new ValidateInputNotNullOrEmpty() ]
            ]);

            if (!$this->hasErrors()) {

                // Update if company already exists
                if ($this->company) {
                    $this->company->name = input()->get('name');
                    $this->company->ip = request()->getIp();
                    $this->company->save();

                    $this->setMessage(lang('Companies.CompanyUpdated'), 'success');

                    response()->refresh();
                }

                // Otherwise create...

                $company = new ModelCompany();
                $company->name = input()->get('name');
                $company->ip = request()->getIp();
                $company->save();

                $this->setMessage(lang('Companies.CompanySaved'), 'success');

                // Refresh
                response()->refresh();
            }
        }

    }

}