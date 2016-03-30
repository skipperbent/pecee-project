<?php

use \Pecee\DB\Migration;
use \Pecee\DB\Schema\Table;

class CreateCompanyTable extends Migration {

    public function up() {

        $this->schema->create('node', function(Table $table){
            $table = new DBTable();
            $table->column('id')->integer()->primary()->increment();
            $table->column('name')->string(255);
            $table->column('ip')->string(255);
            $table->column('created')->datetime()->index();
        });

    }

    public function down() {
        $this->schema->drop('node');
    }

}
