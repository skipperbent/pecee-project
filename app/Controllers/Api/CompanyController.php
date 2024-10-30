<?php

namespace Demo\Controllers\Api;

use Demo\Model\Company;
use Demo\UI\Validation\NotNullOrEmpty;
use Pecee\Controller\ControllerBase;

class CompanyController extends ControllerBase
{

    /**
     * @return void
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Pixie\Exception
     */
    public function index(): void
    {
        response()->json([
            'success' => true,
            'companies' => Company::instance()->all()
        ]);
    }

    /**
     * @return void
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Exceptions\ValidationException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Pixie\Exception
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     */
    public function store(): void
    {
        $this->validate([
            'name' => new NotNullOrEmpty(),
        ]);

        $company = (new Company())
            ->save
            (
                [
                    'name' => input('name'),
                    'ip' => request()->getIp(),
                ]
            );

        $this->show($company->id);
    }

    /**
     * @param int $id
     * @return void
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function update(int $id): void
    {
        $company = Company::instance()->findOrFail($id)->save([
            'name' => input('name'),
        ]);

        $this->show($company->id);
    }

    /**
     * @param int $id
     * @return void
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function destroy(int $id): void
    {
        $company = Company::instance()->findOrFail($id);
        $company->delete();

        response()->json([
            'success' => true,
            'id' => $id,
        ]);
    }

    /**
     * @param int $id
     * @return void
     * @throws \Pecee\Exceptions\InvalidArgumentException
     * @throws \Pecee\Model\Exceptions\ModelNotFoundException
     * @throws \Pecee\Pixie\Exception
     */
    public function show(int $id): void
    {
        response()->json([
            'success' => true,
            'company' => Company::instance()->findOrFail($id),
        ]);
    }

}