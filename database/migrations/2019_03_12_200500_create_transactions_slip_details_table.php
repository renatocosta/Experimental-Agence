<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsSlipDetailsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transactions_slip_details';

    /**
     * Run the migrations.
     * @table transactions_slip_details
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('transactionsSlipDetailsId')
                    ->unsigned(false);
            $table->string('number', 45);
            $table->integer('transactionId');

            $table->index(["transactionId"], 'fk_transactions_slip_details_transactionId_idx');


            $table->foreign('transactionId', 'fk_transactions_slip_details_transactionId_idx')
                ->references('transactionId')->on('transactions')
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
