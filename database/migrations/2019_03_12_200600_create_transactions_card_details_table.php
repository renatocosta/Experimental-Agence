<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsCardDetailsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transactions_card_details';

    /**
     * Run the migrations.
     * @table transactions_card_details
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('transactionCardDetailsId')
                    ->unsigned(false);
            $table->string('holder_name', 200)->nullable()->default(null);
            $table->string('number', 20)->nullable()->default(null);
            $table->date('expiration_date')->nullable()->default(null);
            $table->char('cvv', 5)->nullable()->default(null);
            $table->integer('transactionId')->nullable()->default(null);
            $table->timestamp('createdDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modifiedDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["transactionId"], 'fk_transactions_card_details_transactionId_idx');


            $table->foreign('transactionId', 'fk_transactions_card_details_transactionId_idx')
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