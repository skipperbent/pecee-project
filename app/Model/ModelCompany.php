<?php

namespace Demo\Model;

use Carbon\Carbon;
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

        $this->created = Carbon::now()->toDateTimeString();
	}

}