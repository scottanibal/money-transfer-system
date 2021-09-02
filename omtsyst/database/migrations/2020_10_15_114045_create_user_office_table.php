<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_office', function (Blueprint $table) {
            $table->id();
            $table->string('username', 25)->unique();
            $table->string('phone_number', 15)->unique();
            $table->integer('user')->unsigned();
            $table->integer('office')->unsigned();
            $table->string('photo')->default('user.png');
            $table->boolean('admin')->default(false);
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
        Schema::dropIfExists('user_office');
    }
}
