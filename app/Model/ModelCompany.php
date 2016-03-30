<?php

namespace Demo\Model;

use Pecee\Date;
use Pecee\Model\Model;

class ModelCompany extends Model {

    protected $table = 'company';

    protected $columns = [
        'id',
        'name',
        'ip',
        'created'
    ];

    // Hidden on getArray - useful for json output
	protected $hidden = ['ip'];

	public function __construct() {
		parent::__construct();

        $this->created = Date::toDateTime();
	}

	public static function getById($id) {
		return self::fetchOne('SELECT * FROM {table} WHERE `id` = %s', $id);
	}

	public static function get($rows = 20, $page = 0) {
		return self::fetchPage('SELECT * FROM {table}', $rows, $page);
	}

}