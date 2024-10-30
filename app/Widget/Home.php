<?php

namespace Demo\Widget;

class Home extends Site
{

    protected function onLoad(): void
    {
        $this->prependSiteTitle(lang('Home.Home'));
    }

}