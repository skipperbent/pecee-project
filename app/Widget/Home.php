<?php
namespace Demo\Widget;

use Demo\Model\ModelCompany;
use Pecee\Model\ModelUser;

class Home extends SiteAbstract {

	public function __construct() {
		parent::__construct();

		$this->prependSiteTitle(lang('Home.Home'));

		$this->mainMenu->getItem(0)->addClass('active');

        ModelUser::authenticate('simon.sessingoe@gmail.com', 'test');

		//die(var_dump($test->filterQuery('value')->getQuery()->getQuery()));

		//die(var_dump($test));

	}

}