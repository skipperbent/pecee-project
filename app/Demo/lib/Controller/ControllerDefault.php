<?php
namespace Demo\Controller;
use Demo\Widget\WidgetCompanies;
use Demo\Widget\WidgetContact;
use Demo\Widget\WidgetHome;
use Pecee\Controller\Controller;

class ControllerDefault extends Controller {

	public function getIndex() {
		echo new WidgetHome();
	}

	public function getCompanies($companyId = null) {
		echo new WidgetCompanies($companyId);
	}

	public function postCompanies($companyId = null) {
		echo new WidgetCompanies($companyId);
	}

	public function getContact() {
		echo new WidgetContact();
	}

}