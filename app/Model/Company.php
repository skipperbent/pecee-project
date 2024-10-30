<?php

namespace Demo\Model;

use Carbon\Carbon;
use Pecee\Model\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $columns = [
        'id',
        'name',
        'ip',
    ];

    // Add method to toArray
    protected $with = ['current_date' => 'getCurrentDate'];

    // Hidden on toArray - useful for json output
    protected $without = ['ip'];

    public function __construct()
    {
        parent::__construct();
        $this->ip = request()->ip;

        // Another way to include data
        $this->with['current_week'] = static function (self $company) {
            return Carbon::now()->format('W');
        };
    }

    public function getCurrentDate(): Carbon
    {
        return Carbon::now();
    }

    /**
     * Filter by name
     * @param string $name
     * @return static
     */
    public function filterName($name): self
    {
        return $this->where('name', '=', $name);
    }

}