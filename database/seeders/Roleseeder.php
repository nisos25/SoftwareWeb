<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $role1= Role::create(['name' =>'Admin']);
       $role2 = Role::create(['name' =>'User']);

       Permission::create(['name'=>'admin.index.create'])->assignRole($role1);
       Permission::create(['name'=>'admin.index.edit'])->assignRole($role1);
       Permission::create(['name'=>'admin.index.destroy'])->assignRole($role1); 
    }
}
