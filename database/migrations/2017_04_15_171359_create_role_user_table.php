<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table)
        //Pivot table create
        {
            $table->integer('role_id')->unsigned(); //integer defined role_id
            $table->integer('user_id')->unsigned(); //integer defined user_id

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); //this indicates where the foreign key role_id is coming from
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //this indicates where the foreign key user_id is coming from

            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::drop('role_user');

    }
}
