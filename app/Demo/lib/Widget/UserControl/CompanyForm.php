<?php

namespace Demo\Widget\UserControl;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Demo\Widget\SiteAbstract;

class CompanyForm extends SiteAbstract {

    protected $company;

    public function __construct($companyId = null) {
        parent::__construct();

        $this->setTemplate(null);

        if($companyId !== null) {
            $this->company = Company::getById($companyId);
            $this->prependSiteTitle(lang('Companies.EditCompany', $this->company->name));
        } else {
            $this->prependSiteTitle(lang('Companies.AddCompany'));
        }

        if($this->isPostBack()) {

            $this->validate([
                'name' => new NotNullOrEmpty()
            ]);

            if (!$this->hasErrors()) {

                // Update if company already exists
                if ($this->company && $this->company->hasRow()) {
                    $this->company->name = input()->get('name');
                    $this->company->ip = request()->getIp();
                    $this->company->update();

                    $this->setMessage(lang('Companies.CompanyUpdated'), 'success');

                    response()->refresh();
                }

                // Otherwise create...

                $company = new Company();
                $company->name = input()->get('name');
                $this->company->ip = request()->getIp();
                $company->save();

                $this->setMessage(lang('Companies.CompanySaved'), 'success');

                // Refresh
                response()->refresh();
            }
        }

    }

}