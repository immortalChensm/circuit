<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name'=>'manage_content']);
        Permission::create(['name'=>'manage_user']);
        Permission::create(['name'=>'edit_settings']);

        $founder = Role::create(['name'=>'founder']);
        $founder->givePermissionTo("manage_user");
        $founder->givePermissionTo("manage_content");
        $founder->givePermissionTo("edit_settings");

        $maintainer = Role::create(['name'=>'maintainer']);
        $maintainer->givePermissionTo("manage_content");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        app()['cache']->forget('spatie.permission.cache');

        // 清空所有数据表数据
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();

    }
}
