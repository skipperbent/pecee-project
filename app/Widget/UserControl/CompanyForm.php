<?php

namespace Demo\Widget\UserControl;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;

class CompanyForm extends UserControl
{
    protected $company;

    /**
     * CompanyForm constructor.
     * @param null $companyId
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Pixie\Exception
     */
    public function __construct($companyId = null)
    {
        parent::__construct();

        $this->company = Company::instance()->where('id', '=', $companyId)->firstOrNew();

        $exists = $this->company->exists();

        /* Set site title */
        $siteTitle = $exists ? lang('Companies.EditCompany', $this->company->name) : lang('Companies.AddCompany');
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
                    'ip'   => request()->getIp(),
                ]);

                if ($exists) {
                    $this->setMessage(lang('Companies.CompanyUpdated'), 'success');
                } else {
                    $this->setMessage(lang('Companies.CompanySaved'), 'success');
                }

                response()->refresh();

            }

            $this->saveInputValues([
                'name',
            ]);

            response()->refresh();
        }

    }

}