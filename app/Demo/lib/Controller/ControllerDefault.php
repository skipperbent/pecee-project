<?php
namespace Demo\Controller;
use Demo\Widget\WidgetHome;
use Pecee\Controller\Controller;

class ControllerDefault extends Controller {

	public function getIndex() {
		echo new WidgetHome();
	}

}