<?php
namespace Demo\Controller\Api;

use Demo\CustomValidation\ValidateInputNotNullOrEmpty;
use Demo\Model\ModelCompany;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase {

    public function index() {

        $companyModel = new ModelCompany();

        $companies = $companyModel->get();

        response()->json($companies->toArray());

    }

    public function store() {

        $this->post->name->addValidation([ new ValidateInputNotNullOrEmpty() ]);

        if($this->hasErrors()) {
            throw new \InvalidArgumentException( join(', ', $this->getErrorsArray()) );
        }

        $company = new ModelCompany();
        $company->name = $this->input('name');
        $company->ip = request()->getIp();
        $company->save();

        $this->show($company->id);

    }

    public function update($id) {

        $companyModel = new ModelCompany();

        $company = $companyModel->findOrfail($id);

        $company->name = $this->input('name');
        $company->save();

        $this->show($company->id);
    }

    public function destroy($id) {
        $companyModel = new ModelCompany();

        $company = $companyModel->findOrfail($id);
        $company->delete();

        response()->json(['success' => true]);
    }

    public function show($id) {
        $companyModel = new ModelCompany();
        $company = $companyModel->findOrfail($id);
        response()->json($company->toArray());
    }

}