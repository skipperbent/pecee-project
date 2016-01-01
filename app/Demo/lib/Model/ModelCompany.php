<?php

namespace Demo\Model;

use Pecee\Date;
use Pecee\DB\DBTable;
use Pecee\Model\Model;

class ModelCompany extends Model {

	protected $hidden = ['ip'];

	public function __construct() {

		$table = new DBTable();
		$table->column('id')->integer()->primary()->increment();
		$table->column('name')->string(255);
		$table->column('ip')->string(255);
        $table->column('created')->datetime()->index();

		parent::__construct($table);

        $this->created = Date::toDateTime();
	}

	public static function getById($id) {
		return self::fetchOne('SELECT * FROM {table} WHERE `id` = %s', $id);
	}

	public static function get($rows = 20, $page = 0) {
		return self::fetchPage('SELECT * FROM {table}', $rows, $page);
	}

}