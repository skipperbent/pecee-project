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
        $this->getSite()->addWrappedCss('../bower/bootstrap/dist/css/bootstrap.min.css');
        $this->getSite()->addWrappedCss('../bower/bootstrap/dist/css/bootstrap-theme-min.css');
        $this->getSite()->addWrappedCss('style.css');

        $this->getSite()->addWrappedJs('../bower/jquery/dist/jquery.min.js');
        $this->getSite()->addWrappedJs('../bower/tether/dist/js/tether.min.js');
        $this->getSite()->addWrappedJs('../bower/bootstrap/dist/js/bootstrap.min.js');
        $this->getSite()->addWrappedJs('global.js');

        $this->mainMenu = new Menu();
        $this->mainMenu->addClass('navbar-nav mr-auto');

        $this->mainMenu->addItem(lang('Home.Home'), url('home'))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');

        $this->mainMenu->addItem(lang('Companies.Companies'), url('companies', ''))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');

        $this->mainMenu->addItem(lang('Contact.Contact'), url('page.contact'))
            ->addClass('nav-item')
            ->addLinkAttribute('class', 'nav-link');
    }

    public function getLanguage()
    {
        return app()->getLocale();
    }
}