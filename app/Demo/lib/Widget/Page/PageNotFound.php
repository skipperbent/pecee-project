<?php
namespace Demo\Widget\Page;

use Demo\Widget\WidgetAbstract;

class PageNotFound extends WidgetAbstract {

    public function __construct() {
        parent::__construct();

        $this->prependSiteTitle('404: page not found');

        $this->mainMenu->getItem(0)->addClass('active');
    }

}