<?php

namespace Demo\Controllers;

use Demo\Widget\Companies;
use Demo\Widget\Home;
use Pecee\Widget\Widget;

class DefaultController
{

    public function index(): Widget
    {
        return new Home();
    }

    /**
     * @param null $companyId
     * @return Widget
     * @throws \Pecee\Pixie\Exception
     */
    public function companies($companyId = null): Widget
    {
        return new Companies($companyId);
    }

}