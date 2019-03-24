<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transactions';

    /**
     * Run the migrations.
     * @table transactions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('transactionId')->unsigned(false);
            $table->integer('buyerId');
            $table->integer('wayPaymentId');
            $table->enum('status_payment', ['created', 'done', 'fail'])->default('created');
            $table->mediumInteger('amount');
            $table->timestamp('createdDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modifiedDate')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(["wayPaymentId"], 'fk_transactions_wayPaymentId_idx');

            $table->index(["buyerId"], 'fk_transactions_buyerId_idx');


            $table->foreign('buyerId', 'fk_transactions_buyerId_idx')
                ->references('buyerId')->on('buyers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('wayPaymentId', 'fk_transactions_wayPaymentId_idx')
                ->references('wayPaymentId')->on('way_payments')
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