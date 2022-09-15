<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'anggota-menu',
            'mitra-menu',
            'simpanan-sukarela-list',
            'simpanan-sukarela-create',
            'simpanan-sukarela-edit',
            'simpanan-sukarela-delete',
            'simpanan-wajib-list',
            'simpanan-wajib-create',
            'simpanan-wajib-edit',
            'simpanan-wajib-delete',
            'jenis-produk-list',
            'jenis-produk-create',
            'jenis-produk-edit',
            'jenis-produk-delete',
            'produk-koperasi-list',
            'produk-koperasi-create',
            'produk-koperasi-edit',
            'produk-koperasi-delete',
            'kode-akun-list',
            'kode-akun-create',
            'kode-akun-edit',
            'kode-akun-delete',
            'kas-masuk-list',
            'kas-masuk-create',
            'kas-masuk-edit',
            'kas-masuk-delete',
            'kas-keluar-list',
            'kas-keluar-create',
            'kas-keluar-edit',
            'kas-keluar-delete',
            'pembiayaan-list',
            'pembiayaan-create',
            'pembiayaan-edit',
            'pembiayaan-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'topup-list',
            'topup-create',
            'topup-edit',
            'topup-delete',
            'angsuran-list',
            'angsuran-create',
            'angsuran-edit',
            'angsuran-delete',
            'paylater-provider-list',
            'paylater-provider-create',
            'paylater-provider-edit',
            'paylater-provider-delete',
            'bank-list',
            'bank-create',
            'bank-edit',
            'bank-delete',
            'paylater-list',
            'paylater-create',
            'paylater-edit',
            'paylater-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
