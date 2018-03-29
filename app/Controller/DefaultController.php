<?php

namespace Demo\Controller;

use Demo\Widget\Companies;
use Demo\Widget\Home;

class DefaultController
{

    public function index(): string
    {
        return new Home();
    }

    /**
     * @param null $companyId
     * @return string
     * @throws \Pecee\Pixie\Exception
     */
    public function companies($companyId = null): string
    {
        return new Companies($companyId);
    }

}