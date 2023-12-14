<?php

namespace Database\Seeders;

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create all roles
        $superAdmin = Role::create(['name' => Roles::SUPERADMIN]);
        $colleague = Role::create(['name' => Roles::COLLEAGUE]);
        $customer = Role::create(['name' => Roles::CUSTOMER]);

        // Create all permissions

        $borrow = Permission::create(['name' => Permissions::BORROW]);
        $reserve = Permission::create(['name' => Permissions::RESERVE]);
        $return = Permission::create(['name' => Permissions::RETURN]);
        $loginManage = Permission::create(['name' => Permissions::LOGIN_MANAGE]);

        $viewLibraryPass = Permission::create(['name' => Permissions::VIEW_LIBRARY_PASS]);
        $createLibraryPass = Permission::create(['name' => Permissions::CREATE_LIBRARY_PASS]);
        $editLibraryPass = Permission::create(['name' => Permissions::EDIT_LIBRARY_PASS]);
        $deleteLibraryPass = Permission::create(['name' => Permissions::DELETE_LIBRARY_PASS]);

        $viewItem = Permission::create(['name' => Permissions::VIEW_ITEM]);
        $createItem = Permission::create(['name' => Permissions::CREATE_ITEM]);
        $editItem = Permission::create(['name' => Permissions::EDIT_ITEM]);
        $deleteItem = Permission::create(['name' => Permissions::DELETE_ITEM]);

        $viewUser = Permission::create(['name' => Permissions::VIEW_USER]);
        $createUser = Permission::create(['name' => Permissions::CREATE_USER]);
        $editUser = Permission::create(['name' => Permissions::EDIT_USER]);
        $deleteUser = Permission::create(['name' => Permissions::DELETE_USER]);

        $viewGrant = Permission::create(['name' => Permissions::VIEW_GRANT]);
        $createGrant = Permission::create(['name' => Permissions::CREATE_GRANT]);
        $editGrant = Permission::create(['name' => Permissions::EDIT_GRANT]);
        $deleteGrant = Permission::create(['name' => Permissions::DELETE_GRANT]);

        $viewReservation = Permission::create(['name' => Permissions::VIEW_RESERVATION]);
        $createReservation = Permission::create(['name' => Permissions::CREATE_RESERVATION]);
        $editReservation = Permission::create(['name' => Permissions::EDIT_RESERVATION]);
        $deleteReservation = Permission::create(['name' => Permissions::DELETE_RESERVATION]);

        $viewPayment = Permission::create(['name' => Permissions::VIEW_PAYMENT]);
        $createPayment = Permission::create(['name' => Permissions::CREATE_PAYMENT]);
        $editPayment = Permission::create(['name' => Permissions::EDIT_PAYMENT]);

        $viewFine = Permission::create(['name' => Permissions::VIEW_FINE]);
        $editFine = Permission::create(['name' => Permissions::EDIT_FINE]);



        // -- CUSTOMER
        $customer->givePermissionTo($borrow);
        $customer->givePermissionTo($reserve);
        $customer->givePermissionTo($return);

        // -- COLLEAGUE
        $colleague->givePermissionTo($borrow);
        $colleague->givePermissionTo($reserve);
        $colleague->givePermissionTo($return);
        $colleague->givePermissionTo($loginManage);

        $colleague->givePermissionTo($viewLibraryPass);
        $colleague->givePermissionTo($createLibraryPass);
        $colleague->givePermissionTo($editLibraryPass);
        $colleague->givePermissionTo($deleteLibraryPass);

        $colleague->givePermissionTo($viewItem);
        $colleague->givePermissionTo($createItem);
        $colleague->givePermissionTo($editItem);
        $colleague->givePermissionTo($deleteItem);

        $colleague->givePermissionTo($viewUser);
        $colleague->givePermissionTo($createUser);
        $colleague->givePermissionTo($editUser);
        $colleague->givePermissionTo($deleteUser);

        $colleague->givePermissionTo($viewGrant);
        $colleague->givePermissionTo($createGrant);
        $colleague->givePermissionTo($editGrant);
        $colleague->givePermissionTo($deleteGrant);

        $colleague->givePermissionTo($viewReservation);
        $colleague->givePermissionTo($createReservation);
        $colleague->givePermissionTo($editReservation);
        $colleague->givePermissionTo($deleteReservation);

        $colleague->givePermissionTo($viewPayment);
        $colleague->givePermissionTo($viewFine);
    }
}
