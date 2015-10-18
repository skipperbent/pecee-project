<?php
namespace Demo\Controller;
use Demo\Widget\WidgetAbout;
use Demo\Widget\WidgetContact;
use Demo\Widget\WidgetHome;
use Pecee\Controller\Controller;

class ControllerDefault extends Controller {

	public function getIndex() {
		echo new WidgetHome();
	}

	public function getAbout() {
		echo new WidgetAbout();
	}

	public function getContact() {
		echo new WidgetContact();
	}

}