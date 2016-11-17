<?php

namespace Demo\Model;

use Pecee\Model\Model;

class Company extends Model {

    protected $table = 'company';

    protected $timestamps = true;

    protected $columns = [
        'id',
        'name',
        'ip',
        'updated_at',
        'created_at'
    ];

    // Hidden on getArray - useful for json output
	protected $hidden = ['ip'];

	public function __construct() {
		parent::__construct();

        $this->ip = request()->getIp();
	}

	public static function getById($id) {
		return self::fetchOne('SELECT * FROM {table} WHERE `id` = %s', $id);
	}

	public static function get($rows = 20, $page = 0) {
		return self::fetchPage('SELECT * FROM {table}', $rows, $page);
	}

}