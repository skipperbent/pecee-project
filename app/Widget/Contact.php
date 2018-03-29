<?php

namespace Demo\Widget;

class Contact extends Site
{
    public function __construct()
    {
        parent::__construct();

        $this->prependSiteTitle(lang('Contact.Contact'));

        $this->mainMenu->findItemByUrl(url('page.contact'))->addClass('active');
    }

}