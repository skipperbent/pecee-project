<?php

use \Pecee\DB\Migration;
use \Pecee\DB\Schema\Table;

class CreateCompanyTable extends Migration {

    public function up() {

        $this->schema->create('company', function(Table $table){
            $table->column('id')->integer()->primary()->increment();
            $table->column('name')->string(255)->index();
            $table->column('ip')->string(255);
            $table->timestamps();
        });

    }

    public function down() {
        $this->schema->drop('company');
    }

}
