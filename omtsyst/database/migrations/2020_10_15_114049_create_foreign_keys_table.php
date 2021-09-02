<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * foreign key for property office of user_office table from offices table
         */
        Schema::table('user_office', function (Blueprint $table) {
            $table->foreign('office')->references('id')->on('offices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        /**
         * foreign key for property user of user_office table from users table
         */
        Schema::table('user_office', function (Blueprint $table){
            $table->foreign('user')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        /**
         * foreign key for property sender of transactions table from senders table
         */
        Schema::table('transactions', function(Blueprint $table){
            $table->foreign('sender')->references('id')->on('senders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        /**
         * foreign key for property recipient of transactions table from recipients table
         */
        Schema::table('transactions', function(Blueprint $table){
           $table->foreign('recipient')->references('id')->on('recipients')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });
        /**
         * foreign key for property card of senders table from cards table
         */
//        Schema::table('senders', function(Blueprint $table){
//            $table->foreign('country')->references('id')->on('countries')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//        });
        /**
         * foreign key for property country of offices table from countries table
         */
        Schema::table('offices', function(Blueprint $table){
            $table->foreign('country')->references('id')->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        /**
         * foreign key for property uid of transactions table from users table
         */
        Schema::table('transactions', function(Blueprint $table){
            $table->foreign('uid')->references('id')->on('users')
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
        Schema::table('user_office', function(Blueprint $table){
            $table->dropForeign('user_office_office_foreign');
        });
        Schema::table('user_office', function(Blueprint $table){
            $table->dropForeign('user_office_user_foreign');
        });
        Schema::table('transactions', function(Blueprint $table){
           $table->dropForeign('transactions_sender_foreign');
        });
        Schema::table('transactions', function(Blueprint $table){
            $table->dropForeign('transactions_recipient_foreign');
        });
        Schema::table('offices', function(Blueprint $table){
            $table->dropForeign('offices_country_foreign');
        });
        Schema::table('transactions', function (Blueprint $table){
           $table->dropForeign('transactions_uid_foreign');
        });
    }
}
