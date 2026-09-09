<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Permissions
        Permission::firstOrCreate(['name' => 'atur pengguna'], ['category' => 'pengguna']);
        Permission::firstOrCreate(['name' => 'edit posts'], ['category' => 'pengguna']);
        Permission::firstOrCreate(['name' => 'delete posts'], ['category' => 'pengguna']);
        Permission::firstOrCreate(['name' => 'view reports'], ['category' => 'laporan']);
        // Buat role admin (jika belum ada)
        $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
        $role->syncPermissions(['atur pengguna', 'edit posts', 'delete posts', 'view reports']);
        // Pastikan user admin ada
        $admin = User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'foto' => 'default.png',
                'jabatan' => 'Admin',
                'idstaf' => 'STAFF-001',
                'email' => 'admin@example.com',
                'password' => 'admin123',
            ]
        );
        if ($admin->wasRecentlyCreated || empty($admin->password)) {
            $admin->password = 'admin123';
            $admin->save();
        }
        $admin->syncRoles(['admin']);
        // Berikan izin langsung ke user tertentu
        $admin->givePermissionTo(['atur pengguna', 'edit posts', 'delete posts', 'view reports']);
    }
}
