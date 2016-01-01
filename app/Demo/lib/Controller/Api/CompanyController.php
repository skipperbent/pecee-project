<?php
namespace Demo\Controller\Api;

use Demo\CustomValidation\ValidateInputNotNullOrEmpty;
use Demo\Model\ModelCompany;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase {

    public function index() {

        $companies = ModelCompany::get($this->input('rows', 20), $this->input('page', 0));

        response()->json($companies->getArray());

    }

    public function store() {

        $this->post->name->addValidation([ new ValidateInputNotNullOrEmpty() ]);

        if($this->hasErrors()) {
            throw new \InvalidArgumentException( join(', ', $this->getErrorsArray()) );
        }

        $company = new ModelCompany();
        $company->name = $this->input('name');
        $company->save();

    }

    public function show($id) {

        $company = ModelCompany::getById($id);

        response()->json($company->getArray());

    }

}