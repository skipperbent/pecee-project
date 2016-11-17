<?php
namespace Demo\Controller\Api;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase {

    public function index() {

        $companyModel = new Company();

        $companies = $companyModel->get();

        response()->json($companies->toArray());

    }

    public function store() {

        $this->validate([
            'name' => new NotNullOrEmpty()
        ]);

        if($this->hasErrors()) {
            throw new \InvalidArgumentException( join(', ', $this->getErrorsArray()) );
        }

        $company = new Company();
        $company->name = input()->get('name');
        $company->ip = request()->getIp();
        $company->save();

        $this->show($company->id);

    }

    public function update($id) {

        $companyModel = new Company();

        $company = $companyModel->findOrfail($id);

        $company->name = input()->get('name');
        $company->save();

        $this->show($company->id);
    }

    public function destroy($id) {
        $companyModel = new Company();

        $company = $companyModel->findOrfail($id);
        $company->delete();

        response()->json(['success' => true]);
    }

    public function show($id) {
        $companyModel = new Company();
        $company = $companyModel->findOrfail($id);
        response()->json($company->toArray());
    }

}