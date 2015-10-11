<?php

namespace Demo\Controller;

use Pecee\DB\DBTable;
use Pecee\Model\Model;

class ModelCompany extends Model {

	public function __construct() {

		$table = new DBTable();
		$table->column('id')->integer()->primary()->increment();
		$table->column('name')->string(255);

		parent::__construct();
	}

	public static function GetById($id) {
		return self::FetchOne('SELECT * FROM {table} WHERE `id` = %s', $id);
	}

}