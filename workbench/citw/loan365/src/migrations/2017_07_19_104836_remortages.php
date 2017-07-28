<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Remortages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remortages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->default(null);
            $table->enum('mortgage_type', array('1', '2'))->default('2');
            $table->enum('kinds_of_remotages', array('1', '2'))->default('1');
            $table->integer('value_of_home')->default(null);
            $table->integer('monthly_mortages_repay')->default(null);
            $table->integer('total_years_mortages')->default(null);
            $table->integer('balance_current_mortages')->default(null);
            $table->string('end_date_mortgage_introductory',20);
            $table->enum('applying_type', array('1', '2'))->default('1');
            $table->integer('earn_each_year')->default(null);
            $table->integer('stamp_duty')->default(null);
            $table->string('rental_cover_property', 25);
            $table->integer('outstanding_cc_balances');
            $table->integer('monthly_repay_loan')->default(null);
            $table->enum('country_court_judegment', array('1', '2'))->default('1');
            $table->enum('iva', array('1', '2'))->default('1');
            $table->enum('appeals_type', array('1', '2'))->default('1');
            $table->enum('introductory_rate', array('1', '2', '3', '4', '5'))->default('1');
            $table->enum('capital_type', array('1', '2'))->default('1');
            $table->string('user_name', 60);
            $table->string('user_email', 60);
            $table->string('user_dob', 60);
            $table->integer('monthly_rental_cover')->default(null);
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
        Schema::drop('remortages');
    }
}
