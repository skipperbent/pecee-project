<?php

namespace Demo\Widget;

class Home extends Site
{

    public function __construct()
    {
        parent::__construct();

        $this->prependSiteTitle(lang('Home.Home'));

        $this->mainMenu->findItemByUrl(url('home'))->addClass('active');

    }

}