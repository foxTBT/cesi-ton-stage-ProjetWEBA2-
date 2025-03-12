<?php

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder pour la table sessions

        // DB::table('sessions')->insert([
        //     'id' => Str::uuid(),
        //     'user_id' => $i + 1,
        //     'ip_address' => '192.168.1.' . ($i + 1),
        //     'user_agent' => 'Mozilla/5.0',
        //     'payload' => json_encode(['key' => 'value']),
        //     'last_activity' => time(),
        // ]);


        // Seeder pour la table roles

        DB::table('roles')->insert([
            [
                'Id_Role' => 1,
                'Title_Role' => 'Étudiant',
                'Description_role' => 'Compte étudiant'
            ],
            [
                'Id_Role' => 2,
                'Title_Role' => 'Pilote',
                'Description_role' => 'Compte pilote'
            ],
            [
                'Id_Role' => 3,
                'Title_Role' => 'Admin',
                'Description_role' => 'Compte admin'
            ]
        ]);



        // Seeder pour la table regions
        // DB::table('regions')->insert([
        //     'Id_Region' => $i + 1,
        //     'Name_Region' => 'Region ' . ($i + 1),
        // ]);

        // Seeder pour la table cities
        // DB::table('cities')->insert([
        //     'Id_City' => $i + 1,
        //     'Name_City' => 'City ' . ($i + 1),
        //     'Postal_code_City' => '1000' . ($i + 1),
        //     'Id_Region' => $i + 1,
        // ]);

        // Seeder pour la table skills
        // DB::table('skills')->insert([
        //     'Id_Skill' => $i + 1,
        //     'Name_Skill' => 'Skill ' . ($i + 1),
        // ]);

        // Seeder pour la table statuses
        // DB::table('statuses')->insert([
        //     'Id_Status' => $i + 1,
        //     'Title_Status' => 'Status ' . ($i + 1),
        //     'Description_Status' => 'Description for status ' . ($i + 1),
        // ]);

        // Seeder pour la table categories
        // DB::table('categories')->insert([
        //     'Id_Category' => $i + 1,
        //     'Name_Category' => 'Category ' . ($i + 1),
        //     'Description_Category' => 'Description for category ' . ($i + 1),
        // ]);

        // Seeder pour la table accounts
        /*
        DB::table('accounts')->insert([
            'Id_Account' => $i + 1,
            'Email_Account' => 'jean' . ($i + 1) . '@example.com',
            'Password_Account' => bcrypt('password' . ($i + 1)),
            'First_name_Account' => 'Jean',
            'Last_name_Account' => 'Doe' . ($i + 1),
            'Birth_date_Account' => now()->subYears(30)->toDateString(),
            'Id_Role' => $i + 1,
        ]);*/

        // Seeder pour la table companies
        // DB::table('companies')->insert([
        //     'Id_Company' => $i + 1,
        //     'Name_Company' => 'Company ' . ($i + 1),
        //     'Email_Company' => 'company' . ($i + 1) . '@example.com',
        //     'Phone_number_Company' => '0123456789' . ($i + 1),
        //     'Description_Company' => 'Description for company ' . ($i + 1),
        //     'Siret_number_Company' => '12345678901234',
        //     'Logo_link_Company' => 'http://example.com/logo' . ($i + 1) . '.png',
        //     'Id_City' => $i + 1,
        // ]);


        // Seeder pour la table offers
        // DB::table('offers')->insert([
        //     'Id_Offer' => $i + 1,
        //     'Title_Offer' => 'Offer ' . ($i + 1),
        //     'Description_Offer' => 'Description for offer ' . ($i + 1),
        //     'Salary_Offer' => 50000 + ($i * 1000),
        //     'Begin_date_Offer' => now()->subDays(30)->toDateString(),
        //     'Duration_Offer' => now()->addDays(30)->toDateString(),
        //     'Id_Category' => $i + 1,
        //     'Id_Status' => $i + 1,
        //     'Id_Account' => $i + 1,
        //     'Id_Company' => $i + 1,
        // ]);

        // Seeder pour la table evaluates
        // DB::table('evaluates')->insert([
        //     'Id_Account' => $i + 1,
        //     'Id_Company' => $i + 1,
        //     'Rating' => 4.5,
        // ]);

        // Seeder pour la table applications
        // DB::table('applications')->insert([
        //     'Id_Account' => $i + 1,
        //     'Id_Offer' => $i + 1,
        //     'Cv_link_Application' => 'http://example.com/cv' . ($i + 1) . '.pdf',
        //     'Cover_letter_Application' => 'Cover letter for application ' . ($i + 1),
        //     'Date_Application' => now()->subDays(30)->toDateString(),
        // ]);

        // Seeder pour la table wish_lists
        // DB::table('wish_lists')->insert([
        //     'Id_Account' => $i + 1,
        //     'Id_Offer' => $i + 1,
        // ]);


        // Seeder pour la table manages
        // DB::table('manages')->insert([
        //     'Id_Account' => $i + 1,
        //     'Id_Company' => $i + 1,
        // ]);


        // Seeder pour la table gots
        // DB::table('gots')->insert([
        //     'Id_Offer' => $i + 1,
        //     'Id_Skill' => $i + 1,
        // ]);
    }
}
