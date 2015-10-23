<?php
namespace Demo\Widget;

use Pecee\UI\Html\Html;
use Pecee\UI\Menu\Menu;
use Pecee\Widget\Widget;

abstract class WidgetAbstract extends Widget {

	protected $mainMenu;

	public function __construct() {
		parent::__construct();

		// GetSite contains information about the site - here we can add javascript and change styling etc.
		$this->getSite()->setTitle('Pecee Demo Project');
		$this->getSite()->addWrappedCss('bootstrap.css');
		$this->getSite()->addWrappedCss('bootstrap-theme.css');
		$this->getSite()->addWrappedCss('starter-template.css');

		$this->getSite()->addWrappedJs('jquery-1.11.3.min.js');
		$this->getSite()->addWrappedJs('bootstrap.js');
        $this->getSite()->addWrappedJs('global.js');

		$this->mainMenu = new Menu();
		$this->mainMenu->addClass('nav navbar-nav');
		$this->mainMenu->addItem('Home', url('home'));
		$this->mainMenu->addItem('Companies', url('companies', ['id' => '']));
		$this->mainMenu->addItem('Contact', url('contact'));
	}

	public function showFlash($form = null) {
		$o=$this->showMessages($this->errorType, $form);
		$o.=$this->showMessages('warning', $form);
		$o.=$this->showMessages('info', $form);
		$o.=$this->showMessages('success', $form);
		return $o;
	}

	public function showMessages($type, $form = null) {
		if($this->hasMessages($type, $form)) {
			$o = sprintf('<div class="alert alert-%s">', $type);
			$msg=array();
			/* @var $error \Pecee\UI\Form\FormMessage */
			foreach($this->getMessages($type) as $error) {
				$msg[] = sprintf('%s', $error->getMessage());
			}

			$o .= join('<br/>', $msg) . '</div>';
			return $o;
		}
		return '';
	}

	public function validationFor($name) {
		if(parent::validationFor($name)) {
			$span = new Html('span');
			$span->addClass('msg error');
			$span->setInnerHtml(parent::validationFor($name));
			return $span;
		}
		return '';
	}
}