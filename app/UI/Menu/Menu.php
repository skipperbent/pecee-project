<?php

namespace Demo\UI\Menu;

class Menu extends \Pecee\UI\Menu\Menu
{

    public function addItem($name, $url)
    {
        return parent::addItem($name, $url)
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');
    }

}