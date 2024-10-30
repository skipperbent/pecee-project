<?php

namespace Demo\Widget\Page;

use Demo\Widget\Site;

class PageNotFound extends Site
{
    protected function onLoad(): void
    {
        $this->prependSiteTitle(lang('PageNotFound.PageNotFound'));
        $this->setNavigationMenuItem(url('home'));
    }

}