<?php

namespace Demo\Widget;

class Contact extends Site
{

    protected function onLoad(): void
    {
        $this->prependSiteTitle(lang('Contact.Contact'));
    }

}