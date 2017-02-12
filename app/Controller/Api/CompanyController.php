<?php
namespace Demo\Controller\Api;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase {

    public function index() {

        response()->json(Company::all()->toArray());

    }

    public function store() {

        $this->validate([
            'name' => new NotNullOrEmpty(),
        ]);

        $company = new Company();
        $company->save([
            'name' => input()->get('name'),
            'ip' => request()->getIp(),
        ]);

        $this->show($company->id);

    }

    public function update($id) {

        $company = Company::findOrFail($id)->save([
            'name' => input()->get('name'),
        ]);

        $this->show($company->id);
    }

    public function destroy($id) {

        $company = Company::findOrFail($id);
        $company->delete();

        response()->json([
            'id' => $id,
            'success' => true,
        ]);
    }

    public function show($id) {

        response()->json(Company::findOrFail($id)->toArray());

    }

}