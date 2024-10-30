<?php

namespace Demo\Controllers;

use Demo\Widget\Contact;
use Demo\Widget\Page\PageNotFound;
use Pecee\Widget\Widget;

class PageController
{

    public function contact(): Widget
    {
        return new Contact();
    }

    public function notFound(): Widget
    {
        return new PageNotFound();
    }

}