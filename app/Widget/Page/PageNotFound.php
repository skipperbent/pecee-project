<?php

namespace Demo\Widget\Page;

use Demo\Widget\Site;

class PageNotFound extends Site
{
    public function __construct()
    {
        parent::__construct();

        $this->prependSiteTitle(lang('PageNotFound.PageNotFound'));

        $this->mainMenu->findItemByUrl(url('home'))->addClass('active');
    }

}