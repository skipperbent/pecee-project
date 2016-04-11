<?php
namespace Demo\Controller;

use Demo\Widget\Companies;
use Demo\Widget\Contact;
use Demo\Widget\Home;

class DefaultController {

	public function index() {
		echo new Home();
	}

	public function companies($companyId = null) {
		echo new Companies($companyId);
	}

	public function contact() {
		echo new Contact();
	}

}