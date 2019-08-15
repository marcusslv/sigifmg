<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleAdminOnRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('roles')->insert([
            'name'=> 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at'=> now()
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::delete('delete users where name = ?', ['admin']);
        DB::table('roles')->where(['name'=>'admin'])->delete();
    }
}
