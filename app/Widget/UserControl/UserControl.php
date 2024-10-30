<?php

namespace Demo\Widget\UserControl;

use Pecee\Widget\Widget;

abstract class UserControl extends Widget
{

    // No master template
    protected ?string $_template = '';

}