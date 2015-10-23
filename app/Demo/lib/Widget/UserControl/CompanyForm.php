<?php

namespace Demo\Widget\UserControl;

use Demo\Model\ModelCompany;
use Demo\Widget\WidgetAbstract;
use Pecee\Http\Input\Validation\ValidateInputNotNullOrEmpty;

class CompanyForm extends WidgetAbstract {

    protected $company;

    public function __construct($companyId = null) {
        parent::__construct();

        $this->setTemplate(null);

        $this->company = ModelCompany::getById($companyId);

        if($this->isPostBack()) {

            $this->post->name->addValidation(new ValidateInputNotNullOrEmpty());

            if (!$this->hasErrors()) {

                // Update if company already exists
                if ($this->company && $this->company->hasRow()) {
                    $this->company->name = $this->input('name');
                    $this->company->update();

                    $this->setMessage('The company has been updated', 'success');

                    response()->refresh();
                }

                // Otherwise create...

                $company       = new ModelCompany();
                $company->name = $this->input('name');
                $company->save();

                $this->setMessage('The company has been saved', 'success');

                // Refresh
                response()->refresh();
            }
        }

    }

}