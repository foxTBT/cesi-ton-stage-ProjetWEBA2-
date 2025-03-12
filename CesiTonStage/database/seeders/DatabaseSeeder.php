<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed roles
        DB::table('roles')->insert([
            ['Title_Role' => 'Admin', 'Description_role' => 'Administrator role'],
            ['Title_Role' => 'User', 'Description_role' => 'User role'],
        ]);

        // Seed regions
        DB::table('regions')->insert([
            ['Name_Region' => 'Occitanie'],
            ['Name_Region' => 'Île-de-France'],
            ['Name_Region' => 'Nouvelle-Aquitaine'],
        ]);

        // Seed cities
        DB::table('cities')->insert([
            ['Name_City' => 'Toulouse', 'Postal_code_City' => '31000', 'Id_Region' => 1],
            ['Name_City' => 'Paris', 'Postal_code_City' => '75000', 'Id_Region' => 2],
            ['Name_City' => 'Bordeaux', 'Postal_code_City' => '33000', 'Id_Region' => 3],
        ]);

        // Seed skills
        DB::table('skills')->insert([
            ['Name_Skill' => 'PHP'],
            ['Name_Skill' => 'JavaScript'],
            ['Name_Skill' => 'Laravel'],
        ]);

        // Seed statuses
        DB::table('statuses')->insert([
            ['Title_Status' => 'Open', 'Description_Status' => 'Offer is open'],
            ['Title_Status' => 'Closed', 'Description_Status' => 'Offer is closed'],
        ]);

        // Seed categories
        DB::table('categories')->insert([
            ['Name_Category' => 'Development', 'Description_Category' => 'Development related offers'],
            ['Name_Category' => 'Design', 'Description_Category' => 'Design related offers'],
        ]);

        // Seed accounts
        DB::table('accounts')->insert([
            [
                'Email_Account' => 'admin@example.com',
                'Password_Account' => Hash::make('password'),
                'First_name_Account' => 'Admin',
                'Last_name_Account' => 'User',
                'Birth_date_Account' => '1990-01-01',
                'Id_Role' => 1,
            ],
            [
                'Email_Account' => 'user@example.com',
                'Password_Account' => Hash::make('password'),
                'First_name_Account' => 'Regular',
                'Last_name_Account' => 'User',
                'Birth_date_Account' => '1995-01-01',
                'Id_Role' => 2,
            ],
        ]);

        // Seed companies
        DB::table('companies')->insert([
            [
                'Name_Company' => 'Tech Corp',
                'Email_Company' => 'contact@techcorp.com',
                'Phone_number_Company' => '0123456789',
                'Description_Company' => 'A tech company',
                'Siret_number_Company' => '12345678901234',
                'Logo_link_Company' => null,
                'Id_City' => 1,
            ],
            [
                'Name_Company' => 'Design Studio',
                'Email_Company' => 'contact@designstudio.com',
                'Phone_number_Company' => '0987654321',
                'Description_Company' => 'A design studio',
                'Siret_number_Company' => '98765432109876',
                'Logo_link_Company' => null,
                'Id_City' => 2,
            ],
        ]);

        // Seed offers
        DB::table('offers')->insert([
            [
                'Title_Offer' => 'Junior Developer',
                'Description_Offer' => 'Looking for a junior developer',
                'Salary_Offer' => 30000,
                'Begin_date_Offer' => '2023-04-01',
                'Duration_Offer' => '2023-10-01',
                'Id_Category' => 1,
                'Id_Status' => 1,
                'Id_Account' => 1,
                'Id_Company' => 1,
            ],
            [
                'Title_Offer' => 'Graphic Designer',
                'Description_Offer' => 'Looking for a graphic designer',
                'Salary_Offer' => 25000,
                'Begin_date_Offer' => '2023-05-01',
                'Duration_Offer' => '2023-11-01',
                'Id_Category' => 2,
                'Id_Status' => 1,
                'Id_Account' => 2,
                'Id_Company' => 2,
            ],
        ]);
    }
}