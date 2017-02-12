<?php

namespace Demo\Widget\UserControl;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Demo\Widget\SiteAbstract;

class CompanyForm extends SiteAbstract {

    protected $company;

    public function __construct($companyId = null) {
        parent::__construct();

        $this->company = Company::instance()->where('id', '=', $companyId)->firstOrNew();

        $exists = $this->company->exists();

        if($exists) {
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

                if($exists) {
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