<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("table_id");
            $table->foreign('table_id')->references('id')->on('tables');
            $table->string('token');
            $table->double("total")->default(0) ;
            $table->double('sub_total')->default(0);
            $table->double("tax")->default(0);
            $table->double('service')->default(0);
            $table->integer("status")->default(0);
            $table->integer('estimate_time')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
