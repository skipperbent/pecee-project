<?php
namespace Demo\Widget\UserControl;

use Pecee\Widget\Widget;

abstract class UserControl extends Widget {

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate(null);
    }

}