<?php
namespace Demo\Widget;

use Pecee\UI\Menu\Menu;
use Pecee\Widget\Widget;

abstract class Site extends Widget
{
    protected $mainMenu;

    public function __construct()
    {
        parent::__construct();

        // GetSite contains information about the site - here we can add javascript and change styling etc.
        $this->getSite()->setTitle('Pecee Demo Project');

        $this->getSite()->addCss('/css/app.css');
        $this->getSite()->addJs('/js/app.js');

        $this->mainMenu = new Menu();
        $this->mainMenu->addClass('navbar-nav mr-auto');

        $this->mainMenu
            ->addItem(lang('Home.Home'), url('home'))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');

        $this->mainMenu
            ->addItem(lang('Companies.Companies'), url('companies', ''))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');

        $this->mainMenu
            ->addItem(lang('Contact.Contact'), url('page.contact'))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');
    }

    public function getLanguage()
    {
        return app()->getLocale();
    }
}