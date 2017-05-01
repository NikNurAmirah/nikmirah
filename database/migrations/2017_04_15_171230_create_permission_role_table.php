<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        //pivot table creation
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned(); //integer defined permission_id
            $table->integer('role_id')->unsigned(); //integer defined role_id

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade'); //this indicates where the foreign key permission_id is coming from
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); //this indicates where the foreign key role_id is coming from

            $table->primary(['permission_id', 'role_id']);
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
        Schema::drop('permission_role');

    }
}
