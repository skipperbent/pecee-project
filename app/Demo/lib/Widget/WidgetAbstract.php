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
		$this->mainMenu->addItem('Home', url('ControllerDefault@index'));
		$this->mainMenu->addItem('About', url('ControllerDefault@about'));
		$this->mainMenu->addItem('Contact', url('ControllerDefault@contact'));
	}

	public function showFlash($formName=NULL) {
		$o=$this->showMessages('error', $formName);
		$o.=$this->showMessages('warning', $formName);
		$o.=$this->showMessages('info', $formName);
		$o.=$this->showMessages('success', $formName);
		return $o;
	}

	public function showMessages($type, $formName = NULL) {
		if(is_null($formName) || is_null($this->getFormName()) || $formName == $this->getFormName()) {
			if($this->hasMessages($type)) {
				$o = sprintf('<div class="msg %s"><div class="txt">', $type);
				$msg=array();
				/* @var $error \Pecee\UI\Form\FormMessage */
				foreach($this->getMessages($type) as $error) {
					$msg[] = sprintf('%s', $error->getMessage());
				}

				$o .= join('<br/>', $msg) . '</div></div>';
				return $o;
			}
		}
		return '';
	}

	protected function validationFor($name) {
		if($this->form()->validationFor($name)) {
			$span = new Html('span');
			$span->addClass('msg error');
			$span->setInnerHtml($this->form()->validationFor($name));
			return $span;
		}
		return '';
	}
}