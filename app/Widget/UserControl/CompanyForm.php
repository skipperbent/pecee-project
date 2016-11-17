<?php

namespace Demo\Widget\UserControl;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Demo\Widget\SiteAbstract;

class CompanyForm extends SiteAbstract {

    protected $company;
    protected $exists;

    public function __construct($companyId = null) {
        parent::__construct();

        if($companyId !== null) {
            $this->company = Company::instance()->find($companyId);
        } else {
            $this->company = new Company();
        }

        $this->exists = $this->company->exists();

        if($this->exists) {
            $this->prependSiteTitle(lang('Companies.EditCompany', $this->company->name));
        } else {
            $this->prependSiteTitle(lang('Companies.AddCompany'));
        }

        if($this->isPostBack()) {

            $this->validate([
                'name' => [ new NotNullOrEmpty() ]
            ]);

            if (!$this->hasErrors()) {

                $this->company->save([
                    'name' => input()->get('name'),
                    'ip' => request()->getIp(),
                ]);

                if($this->exists) {
                    $this->setMessage(lang('Companies.CompanyUpdated'), 'success');
                } else {
                    $this->setMessage(lang('Companies.CompanySaved'), 'success');
                }

                // Refresh
                response()->refresh();
            }
        }

    }

}