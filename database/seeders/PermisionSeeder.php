<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        // Permission List as array
        $permissions = [


            'dahboard.information',

            'Student.Apply',




            // User Permissions
            'user.all',

            // Student Permissions
            'student.all',


            // Role Permissions
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            //Hall
            'hall.all',
            'room.all',
            'seat.all',
            'hall.Seat-allocation',
            'hall.Seat-change',



        ];


        // Create and Assign Permissions
        //
        for ($i = 0; $i < count($permissions); $i++) {
            // Create Permission
            $permission = Permission::create(['name' => $permissions[$i]]);

        }
    }
}
