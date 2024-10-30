<?php

namespace Demo\Widget;

use Demo\UI\Menu\Menu;
use Pecee\Widget\Widget;

abstract class Site extends Widget
{
    protected Menu $mainMenu;

    public function __construct()
    {
        // GetSite contains information about the site - here we can add javascript and change styling etc.
        $this->getSite()
            ->setTitle('Pecee Demo Project')
            ->addCss('/css/app.css')
            ->addJs('/js/app.js');

        $this->mainMenu = (new Menu())->addClass('navbar-nav mr-auto');

        $this->mainMenu->addItem(lang('Home.Home'), url('home'));
        $this->mainMenu->addItem(lang('Companies.Companies'), url('companies', ''));
        $this->mainMenu->addItem(lang('Contact.Contact'), url('page.contact'));

        $this->setNavigationMenuItem();
    }

    protected function setNavigationMenuItem(?string $url = null): void
    {
        $this->mainMenu->findItemByUrl($url ?? url())?->addClass('active');
    }

    public function getLanguage(): string
    {
        return app()->getLocale();
    }
}