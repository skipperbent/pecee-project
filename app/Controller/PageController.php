<?php
namespace Demo\Controller;

use Demo\Widget\Contact;
use Demo\Widget\Page\PageNotFound;

class PageController
{

    public function contact()
    {
        echo new Contact();
    }

    public function notFound()
    {
        echo new PageNotFound();
    }

}