<?php
namespace Demo\Widget\Page;

use Demo\Widget\WidgetAbstract;

class PageNotFound extends SiteAbstract {

    public function __construct() {
        parent::__construct();

        $this->prependSiteTitle(lang('PageNotFound.PageNotFound'));

        $this->mainMenu->getItem(0)->addClass('active');
    }

}