<?php

namespace Demo\Controller;

use Demo\Widget\Contact;
use Demo\Widget\Page\PageNotFound;

class PageController
{

    public function contact(): string
    {
        return new Contact();
    }

    public function notFound(): string
    {
        return new PageNotFound();
    }

}