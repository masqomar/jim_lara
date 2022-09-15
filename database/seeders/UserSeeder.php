<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'tanggal_pendaftaran' => Carbon::now(),
            'nama' => 'admin',
            'email' => 'admin@admin.com',
            'kelamin' => 'laki-laki',
            'telepon' => '08989',
            'no_anggota' => 'admin1',
            'level' => 'admin',
            'saldo' => 0,
            'password' => Hash::make('@dm1nJim'),
            'pin' => Hash::make('J1m3n'),
            'status' => 1
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
