<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->date('previous_date');
            $table->date('current_date');
            $table->integer('no_days');
            $table->double('previous_reading');
            $table->double('current_reading');
            $table->double('usage');
            $table->double('billed_usage');
            $table->double('period_charge');
            $table->double('access_charge');
            $table->date('statement_date')->nullable();
            $table->timestamps();

            $table->foreign('shop_id')
              ->references('id')->on('shops')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
}
