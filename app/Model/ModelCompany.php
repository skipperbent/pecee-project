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

    // Hidden on toArray - useful for json output
	protected $hidden = ['ip'];

    // Add method to toArray
    protected $with = ['current_date'];

	public function __construct() {
		parent::__construct();

        $this->created = Carbon::now()->toDateTimeString();
	}

    public function currentDate() {
        return Carbon::now();
    }

    /**
     * Filter by name
     * @param string $name
     * @return static
     */
    public function filterName($name) {
        return $this->where('name', '=', $name);
    }

}