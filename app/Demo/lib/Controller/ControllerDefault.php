<?php
namespace Demo\Controller;
use Demo\Widget\WidgetCompanies;
use Demo\Widget\WidgetContact;
use Demo\Widget\WidgetHome;
use Pecee\Controller\Controller;

class ControllerDefault extends Controller {

	public function index() {
		echo new WidgetHome();
	}

	public function companies($companyId = null) {
		echo new WidgetCompanies($companyId);
	}

	public function contact() {
		echo new WidgetContact();
	}

}