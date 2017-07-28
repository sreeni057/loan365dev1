<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Purchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('mortgage_type', array('1', '2'))->default('1');
            $table->integer('user_id')->default('0');
            $table->enum('buyer_type', array('1', '2', '3'))->default('1');
            $table->enum('applying_type', array('1', '2'))->default('1');
            $table->integer('earn_each_year')->default('0');
            $table->integer('stamp_duty')->default('0');
            $table->integer('rental_cover')->default('0');
            $table->integer('outstanding_cc_balances')->default('0');
            $table->integer('monthly_repay_loan')->default('0');
            $table->enum('country_court_judegment', array('1', '2'))->default('1');
            $table->enum('iva', array('1', '2'))->default('1');
            $table->enum('appeals_type', array('1', '2'))->default('1');
            $table->enum('introductory_rate', array('1', '2', '3', '4', '5'))->default('1');
            $table->enum('capital_type', array('1', '2'))->default('1');
            $table->string('user_name', 60);
            $table->string('user_email', 60);
            $table->string('user_dob', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchases');
    }
}
