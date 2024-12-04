<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermission extends Seeder
{
    // permission: tambah-admin, tambah-user, tambah-produk
    // role: superAdmin, admin, user


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        permission::create(['name' => 'tambah-admin']);
        permission::create(['name' => 'edit-admin']);
        permission::create(['name' => 'hapus-admin']);
        Permission::create(['name' => 'lihat-admin']);

        permission::create(['name' => 'tambah-user']);
        permission::create(['name' => 'edit-user']);
        permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        permission::create(['name' => 'edit-profil']);
        permission::create(['name' => 'print-reservasi']);
        permission::create(['name' => 'beli-produk']);
        Permission::create(['name' => 'lihat-produk']);

        Role::create(['name' => 'superAdmin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'user']);

        $roleSuperAdmin = Role::findByName('superAdmin');
        $roleSuperAdmin->givePermissionTo('tambah-admin');
        $roleSuperAdmin->givePermissionTo('edit-admin');
        $roleSuperAdmin->givePermissionTo('hapus-admin');
        $roleSuperAdmin->givePermissionTo('lihat-admin');

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAdmin = Role::findByName('user');
        $roleAdmin->givePermissionTo('edit-profil');
        $roleAdmin->givePermissionTo('print-reservasi');
        $roleAdmin->givePermissionTo('beli-produk');
        $roleAdmin->givePermissionTo('lihat-produk');
    }
}
