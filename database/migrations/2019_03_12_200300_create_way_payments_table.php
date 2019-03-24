<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWayPaymentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'way_payments';

    /**
     * Run the migrations.
     * @table way_payments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('wayPaymentId')
                    ->unsigned(false);
            $table->string('name', 60);
            $table->mediumText('description')->nullable()->default(null);
            $table->timestamp('createdDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modifiedDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}