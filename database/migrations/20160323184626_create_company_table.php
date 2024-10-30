<?php

use \Pecee\DB\Migration;
use \Pecee\DB\Schema\Table;

class CreateCompanyTable extends Migration {

    public function up(): void {

        $this->schema->create('company', static function(Table $table){
            $table->column('id')->integer()->primary()->increment();
            $table->column('name')->string(255)->index();
            $table->column('ip')->string(255);
            $table->timestamps();
        });

    }

    public function down(): void {
        $this->schema->drop('company');
    }

}
