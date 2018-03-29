<?php

namespace Demo\Controller\Api;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase
{

    /**
     * @return string
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Pixie\Exception
     */
    public function index(): string
    {
        return response()->json(Company::instance()->all()->toArray());
    }

    /**
     * @return string
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Exceptions\ValidationException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Pixie\Exception
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     */
    public function store(): string
    {
        $this->validate([
            'name' => new NotNullOrEmpty(),
        ]);

        $company = new Company();
        $company->save([
            'name' => input('name'),
            'ip'   => request()->getIp(),
        ]);

        return $this->show($company->id);
    }

    /**
     * @param $id
     * @return string
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function update($id): string
    {
        $company = Company::instance()->findOrFail($id)->save([
            'name' => input('name'),
        ]);

        return $this->show($company->id);
    }

    /**
     * @param $id
     * @return string
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function destroy($id): string
    {
        $company = Company::instance()->findOrFail($id);
        $company->delete();

        return response()->json([
            'id'      => $id,
            'success' => true,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function show($id): string
    {
        return response()->json(Company::instance()->findOrFail($id)->toArray());
    }

}