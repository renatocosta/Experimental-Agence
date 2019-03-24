<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'buyers';

    /**
     * Run the migrations.
     * @table buyers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('buyerId')
                    ->unsigned(false);
            $table->string('name', 200);
            $table->string('mail', 100);
            $table->string('cpf', 45);
            $table->timestamp('createdDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modifiedDate')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('clientId');

            $table->index(["clientId"], 'fk_buyers_clients_id_idx');


            $table->foreign('clientId', 'fk_buyers_clients_id_idx')
                ->references('clientId')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');
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