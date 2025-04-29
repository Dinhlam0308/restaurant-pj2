<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('food_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('quantity')->default(1);
            $table->enum('kitchen_status',['đang chờ','xác nhận làm','đã làm xong'])->default('đang chờ');
            $table->boolean('sent')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('sent');
        });
    }
}
