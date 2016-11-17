<?php
namespace Demo\Controller\Api;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase {

    public function index() {

        $companies = Company::get(input()->get('rows', 20), input()->get('page', 0));

        response()->json($companies->getArray());

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
        $company->save();

    }

    public function show($id) {

        $company = Company::getById($id);

        response()->json($company->getArray());

    }

}