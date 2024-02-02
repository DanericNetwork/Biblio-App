<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\ModifiedEnum;
use App\Models\Author;
use App\Models\LibraryPass;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Traits\CommonLibraryTrait;

class DatabaseSeeder extends Seeder
{
    use CommonLibraryTrait;
    /**
     * Seed the application's database.
     * Run this seeder with the following command: php artisan db:seed --class=DatabaseSeeder
     */
    public function run(): void
    {
        //create super admin
        $superAdmin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@biblio.nl',
            'residence' => 'Zwolle',
            'street' => 'Straat',
            'zip_code' => '1234AB',
            'house_number' => '1',
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LibraryPass::create([
            'user_id' => $superAdmin->id,
            'barcode' => $this->generateValidLibraryPassBarCode(),
            'is_active' => true,
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => $superAdmin->id,
        ]);

        //create admin, fill in your own details
        $admin = User::create([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'residence' => '',
            'street' => '',
            'zip_code' => '',
            'house_number' => '',
            'modified_kind' => 'I',
            'modified_user' => $superAdmin->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        LibraryPass::create([
            'user_id' => $admin->id,
            'barcode' => $this->generateValidLibraryPassBarCode(),
            'is_active' => true,
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => $superAdmin->id,
        ]);


        Author::create([
          'name' => 'Unknown',
          'modified_kind' => ModifiedEnum::inserted,
          'modified_user' => $superAdmin->id,
        ]);
    }
}
