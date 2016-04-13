<?php
namespace Demo\Widget;

use Pecee\Locale;
use Pecee\UI\Html\Html;
use Pecee\UI\Menu\Menu;
use Pecee\Widget\Widget;

abstract class SiteAbstract extends Widget {

	protected $mainMenu;

	public function __construct() {
		parent::__construct();

		// GetSite contains information about the site - here we can add javascript and change styling etc.
		$this->getSite()->setTitle('Pecee Demo Project');
		$this->getSite()->addWrappedCss('../bower/bootstrap/dist/css/bootstrap.min.css');
		$this->getSite()->addWrappedCss('../bower/bootstrap/dist/css/bootstrap-theme-min.css');
		$this->getSite()->addWrappedCss('style.css');

		$this->getSite()->addWrappedJs('../bower/jquery/dist/jquery.min.js');
		$this->getSite()->addWrappedJs('../bower/bootstrap/dist/js/bootstrap.min.js');
        $this->getSite()->addWrappedJs('global.js');

		$this->mainMenu = new Menu();
		$this->mainMenu->addClass('nav navbar-nav');
		$this->mainMenu->addItem(lang('Home.Home'), url('home'));
		$this->mainMenu->addItem(lang('Companies.Companies'), url('companies', ['id' => '']));
		$this->mainMenu->addItem(lang('Contact.Contact'), url('contact'));
	}

    public function getLanguage() {
        return Locale::getInstance()->getLocale();
    }

	public function showFlash($form = null, $placement = null) {
		$o=$this->showMessages($this->errorType, $form, $placement);
		$o.=$this->showMessages('warning', $form, $placement);
		$o.=$this->showMessages('info', $form, $placement);
		$o.=$this->showMessages('success', $form, $placement);
		return $o;
	}

	public function validationFor($name) {
		if(parent::validationFor($name)) {
			$span = new Html('span');
			$span->addClass('msg error');
			$span->addInnerHtml(parent::validationFor($name));
			return $span;
		}
		return '';
	}
}