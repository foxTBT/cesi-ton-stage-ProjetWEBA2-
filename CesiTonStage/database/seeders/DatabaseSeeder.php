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
        DB::table('regions')->insert([
            [
            'Id_Region' => 1,
            'Name_Region' => 'AUVERGNE-RHONE-ALPES',
            ],
            [
            'Id_Region' => 2,
            'Name_Region' => 'BOURGOGNE-FRANCHE-COMTE',
            ],
            [
            'Id_Region' => 3,
            'Name_Region' => 'BRETAGNE',
            ],
            [
            'Id_Region' => 4,
            'Name_Region' => 'CENTRE-VAL_DE_LOIRE',
            ],
            [
            'Id_Region' => 5,
            'Name_Region' => 'CORSE',
            ],
            [
            'Id_Region' => 6,
            'Name_Region' => 'GRAND_EST',
            ],
            [
            'Id_Region' => 7,
            'Name_Region' => 'HAUTS-DE-FRANCE',
            ],
            [
            'Id_Region' => 8,
            'Name_Region' => 'ILE-DE-FRANCE',
            ],
            [
            'Id_Region' => 9,
            'Name_Region' => 'NORMANDIE',
            ],
            [
            'Id_Region' => 10,
            'Name_Region' => 'NOUVELLE-AQUITAINE',
            ],
            [
            'Id_Region' => 11,
            'Name_Region' => 'OCCITANIE',
            ],
            [
            'Id_Region' => 12,
            'Name_Region' => 'PAYS_DE_LA_LOIRE',
            ],
            [
            'Id_Region' => 13,
            'Name_Region' => 'PROVENCE_ALPES_COTE_D_AZUR',
            ]
        ]);

        // Seeder pour la table cities
        DB::table('cities')->insert([
            //AUVERGNE-RHONE-ALPES
            [
            'Id_City' => 1,
            'Name_City' => 'LYON',
            'Postal_code_City' => '69000',
            'Id_Region' => 1,
            ],
            [
            'Id_City' => 2,
            'Name_City' => 'GRENOBLE',
            'Postal_code_City' => '38000',
            'Id_Region' => 1,
            ],
            [
            'Id_City' => 3,
            'Name_City' => 'SAINT-ETIENNE',
            'Postal_code_City' => '42000',
            'Id_Region' => 1,
            ],

            //BOURGOGNE-FRANCHE-COMTE
            [
            'Id_City' => 4,
            'Name_City' => 'DIJON',
            'Postal_code_City' => '21000',
            'Id_Region' => 2,
            ],
            [
            'Id_City' => 5,
            'Name_City' => 'BESANCON',
            'Postal_code_City' => '25000',
            'Id_Region' => 2,
            ],
            [
            'Id_City' => 6,
            'Name_City' => 'CHALON-SUR-SAONE',
            'Postal_code_City' => '71100',
            'Id_Region' => 2,
            ],

            //BRETAGNE
            [
            'Id_City' => 7,
            'Name_City' => 'RENNES',
            'Postal_code_City' => '35000',
            'Id_Region' => 3,
            ],
            [
            'Id_City' => 8,
            'Name_City' => 'BREST',
            'Postal_code_City' => '29200',
            'Id_Region' => 3,
            ],
            [
            'Id_City' => 9,
            'Name_City' => 'QUIMPER',
            'Postal_code_City' => '29000',
            'Id_Region' => 3,
            ],

            //CENTRE-VAL_DE_LOIRE
            [
            'Id_City' => 10,
            'Name_City' => 'TOURS',
            'Postal_code_City' => '37000',
            'Id_Region' => 4,
            ],
            [
            'Id_City' => 11,
            'Name_City' => 'ORLEANS',
            'Postal_code_City' => '45000',
            'Id_Region' => 4,
            ],
            [
            'Id_City' => 12,
            'Name_City' => 'BOURGES',
            'Postal_code_City' => '18000',
            'Id_Region' => 4,
            ],

            //CORSE
            [
            'Id_City' => 13,
            'Name_City' => 'AJACCIO',
            'Postal_code_City' => '20000',
            'Id_Region' => 5,
            ],
            [
            'Id_City' => 14,
            'Name_City' => 'BASTIA',
            'Postal_code_City' => '20200',
            'Id_Region' => 5,
            ],
            [
            'Id_City' => 15,
            'Name_City' => 'PORTO-VECCHIO',
            'Postal_code_City' => '20137',
            'Id_Region' => 5,
            ],

            //GRAND_EST
            [
            'Id_City' => 16,
            'Name_City' => 'STRASBOURG',
            'Postal_code_City' => '67000',
            'Id_Region' => 6,
            ],
            [
            'Id_City' => 17,
            'Name_City' => 'REIMS',
            'Postal_code_City' => '51100',
            'Id_Region' => 6,
            ],
            [
            'Id_City' => 18,
            'Name_City' => 'METZ',
            'Postal_code_City' => '57000',
            'Id_Region' => 6,
            ],

            //HAUTS-DE-FRANCE
            [
            'Id_City' => 19,
            'Name_City' => 'LILLE',
            'Postal_code_City' => '59000',
            'Id_Region' => 7,
            ],
            [
            'Id_City' => 20,
            'Name_City' => 'AMIENS',
            'Postal_code_City' => '80000',
            'Id_Region' => 7,
            ],
            [
            'Id_City' => 21,
            'Name_City' => 'ROUBAIX',
            'Postal_code_City' => '59100',
            'Id_Region' => 7,
            ],

            //ILE-DE-FRANCE
            [
            'Id_City' => 22,
            'Name_City' => 'PARIS',
            'Postal_code_City' => '75000',
            'Id_Region' => 8,
            ],
            [
            'Id_City' => 23,
            'Name_City' => 'BOULOGNE-BILLANCOURT',
            'Postal_code_City' => '92100',
            'Id_Region' => 8,
            ],
            [
            'Id_City' => 24,
            'Name_City' => 'SAINT-DENIS',
            'Postal_code_City' => '93200',
            'Id_Region' => 8,
            ],
            
            //NORMANDIE
            [
            'Id_City' => 25,
            'Name_City' => 'LE_HAVRE',
            'Postal_code_City' => '76600',
            'Id_Region' => 9,
            ],
            [
            'Id_City' => 26,
            'Name_City' => 'ROUEN',
            'Postal_code_City' => '76000',
            'Id_Region' => 9,
            ],
            [
            'Id_City' => 27,
            'Name_City' => 'CAEN',
            'Postal_code_City' => '14000',
            'Id_Region' => 9,
            ],

            //NOUVELLE-AQUITAINE
            [
            'Id_City' => 28,
            'Name_City' => 'BORDEAUX',
            'Postal_code_City' => '33000',
            'Id_Region' => 10,
            ],
            [
            'Id_City' => 29,
            'Name_City' => 'LIMOGES',
            'Postal_code_City' => '87000',
            'Id_Region' => 10,
            ],
            [
            'Id_City' => 30,
            'Name_City' => 'POITIERS',
            'Postal_code_City' => '86000',
            'Id_Region' => 10,
            ],

            //OCCITANIE
            [
            'Id_City' => 31,
            'Name_City' => 'TOULOUSE',
            'Postal_code_City' => '31000',
            'Id_Region' => 11,
            ],
            [
            'Id_City' => 32,
            'Name_City' => 'MONTPELLIER',
            'Postal_code_City' => '34000',
            'Id_Region' => 11,
            ],
            [
            'Id_City' => 33,
            'Name_City' => 'NIMES',
            'Postal_code_City' => '30000',
            'Id_Region' => 11,
            ],

            //PAYS_DE_LA_LOIRE
            [
            'Id_City' => 34,
            'Name_City' => 'NANTES',
            'Postal_code_City' => '44000',
            'Id_Region' => 12,
            ],
            [
            'Id_City' => 35,
            'Name_City' => 'ANGERS',
            'Postal_code_City' => '49000',
            'Id_Region' => 12,
            ],
            [
            'Id_City' => 36,
            'Name_City' => 'LE_MANS',
            'Postal_code_City' => '72000',
            'Id_Region' => 12,
            ],

            //PROVENCE_ALPES_COTE_D_AZUR
            [
            'Id_City' => 37,
            'Name_City' => 'MARSEILLE',
            'Postal_code_City' => '13000',
            'Id_Region' => 13,
            ],
            [
            'Id_City' => 38,
            'Name_City' => 'NICE',
            'Postal_code_City' => '06000',
            'Id_Region' => 13,
            ],
            [
            'Id_City' => 39,
            'Name_City' => 'TOULON',
            'Postal_code_City' => '83000',
            'Id_Region' => 13,
            ],

        ]);

        // Seeder pour la table skills
        DB::table('skills')->insert([
            [
            'Id_Skill' => 1,
            'Name_Skill' => 'PHP',
            ],
            [
            'Id_Skill' => 2,
            'Name_Skill' => 'C++',
            ],
            [
            'Id_Skill' => 3,
            'Name_Skill' => 'SQL',
            ],
            [
            'Id_Skill' => 4,
            'Name_Skill' => 'C',
            ],
            [
            'Id_Skill' => 5,
            'Name_Skill' => 'GIT',
            ],
            [
            'Id_Skill' => 6,
            'Name_Skill' => 'JS',
            ],
            [
            'Id_Skill' => 7,
            'Name_Skill' => 'LARAVEL',
            ],
            [
            'Id_Skill' => 8,
            'Name_Skill' => 'ANGULAR',
            ],
            [
            'Id_Skill' => 9,
            'Name_Skill' => 'HTML',
            ],
            [
            'Id_Skill' => 10,
            'Name_Skill' => 'CSS',
            ],
        ]);

        // Seeder pour la table statuses
        DB::table('statuses')->insert([
            [
            'Id_Status' => 1,
            'Title_Status' => 'ACCEPTE',
            'Description_Status' => 'bar',
            ],
            [
            'Id_Status' => 2,
            'Title_Status' => 'EN_COURS',
            'Description_Status' => 'bar',
            ],
            [
            'Id_Status' => 3,
            'Title_Status' => 'REFUSE',
            'Description_Status' => 'bar',
            ],

        ]);

        // Seeder pour la table categories
        DB::table('categories')->insert([
            [
            'Id_Category' => 1,
            'Name_Category' => 'STAGE',
            'Description_Category' => 'bar',
            ],
            [
            'Id_Category' => 2,
            'Name_Category' => 'ALTERNANCE',
            'Description_Category' => 'bar',
            ],
        ]);

        // Seeder pour la table accounts
        
        DB::table('accounts')->insert([
            ['Id_Account' => 1,
            'Email_Account' => 'jean' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Jean',
            'Last_name_Account' => 'Doe',
            'Birth_date_Account' => now()->subYears(30)->toDateString(),
            'Id_Role' => 1],
            ['Id_Account' => 2,
            'Email_Account' => 'pierre' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Pierre',
            'Last_name_Account' => 'Baptiste',
            'Birth_date_Account' => now()->subYears(31)->toDateString(),
            'Id_Role' => 1],
            ['Id_Account' => 3,
            'Email_Account' => 'michel' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Michel',
            'Last_name_Account' => 'Arti',
            'Birth_date_Account' => now()->subYears(12)->toDateString(),
            'Id_Role' => 1],
            ['Id_Account' => 4,
            'Email_Account' => 'Maxime' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Maxime',
            'Last_name_Account' => 'Moysset',
            'Birth_date_Account' => now()->subYears(10)->toDateString(),
            'Id_Role' => 1],
            ['Id_Account' => 5,
            'Email_Account' => 'diego' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Diego',
            'Last_name_Account' => 'Borto',
            'Birth_date_Account' => now()->subYears(13)->toDateString(),
            'Id_Role' => 1],
            ['Id_Account' => 6,
            'Email_Account' => 'mathis' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Mathis',
            'Last_name_Account' => 'Voshgel',
            'Birth_date_Account' => now()->subYears(13)->toDateString(),
            'Id_Role' => 1],

            ['Id_Account' => 7,
            'Email_Account' => 'steven' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Steven',
            'Last_name_Account' => 'Esco',
            'Birth_date_Account' => now()->subYears(63)->toDateString(),
            'Id_Role' => 2],
            ['Id_Account' => 8,
            'Email_Account' => 'thomas' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Thomas',
            'Last_name_Account' => 'Palo',
            'Birth_date_Account' => now()->subYears(13)->toDateString(),
            'Id_Role' => 2],
            ['Id_Account' => 9,
            'Email_Account' => 'chris' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Chris',
            'Last_name_Account' => 'Milan',
            'Birth_date_Account' => now()->subYears(19)->toDateString(),
            'Id_Role' => 2],
            ['Id_Account' => 10,
            'Email_Account' => 'argan' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Argan',
            'Last_name_Account' => 'LeTomic',
            'Birth_date_Account' => now()->subYears(65)->toDateString(),
            'Id_Role' => 2],
            ['Id_Account' => 11,
            'Email_Account' => 'raphael' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Raphael',
            'Last_name_Account' => 'Fabian',
            'Birth_date_Account' => now()->subYears(17)->toDateString(),
            'Id_Role' => 2],
            ['Id_Account' => 12,
            'Email_Account' => 'yren' . '@example.com',
            'Password_Account' => bcrypt('password' . (1234)),
            'First_name_Account' => 'Yren',
            'Last_name_Account' => 'Jaegger',
            'Birth_date_Account' => now()->subYears(23)->toDateString(),
            'Id_Role' => 2],

        ]);

        // Seeder pour la table companies
        DB::table('companies')->insert([
            [
            'Id_Company' => 1,
            'Name_Company' => 'UBISOFT',
            'Email_Company' => 'contact' . '@ubisoft.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo1' . '.png',
            'Id_City' => 1,
            ],
            [
            'Id_Company' => 2,
            'Name_Company' => 'STEAM',
            'Email_Company' => 'contact' . '@steam.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo2' . '.png',
            'Id_City' => 2,
            ],
            [
            'Id_Company' => 3,
            'Name_Company' => 'SOPRA_STERIA',
            'Email_Company' => 'contact' . '@soprasteria.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo3' . '.png',
            'Id_City' => 3,
            ],
            [
            'Id_Company' => 4,
            'Name_Company' => 'INFOTEL',
            'Email_Company' => 'contact' . '@infotel.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo4' . '.png',
            'Id_City' => 4,
            ],
            [
            'Id_Company' => 5,
            'Name_Company' => 'KNDS',
            'Email_Company' => 'contact' . '@knds.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo5' . '.png',
            'Id_City' => 5,
            ],
            [
            'Id_Company' => 6,
            'Name_Company' => 'CAPGEMINI',
            'Email_Company' => 'contact' . '@capgemini.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo6' . '.png',
            'Id_City' => 6,
            ],
            [
            'Id_Company' => 7,
            'Name_Company' => 'TBM',
            'Email_Company' => 'contact' . '@tbm.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo7' . '.png',
            'Id_City' => 7,
            ],
            [
            'Id_Company' => 8,
            'Name_Company' => 'TISSEO',
            'Email_Company' => 'contact' . '@tisseo.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo8' . '.png',
            'Id_City' => 8,
            ],
             [
            'Id_Company' => 9,
            'Name_Company' => 'UBER',
            'Email_Company' => 'contact' . '@uber.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo9' . '.png',
            'Id_City' => 9,
            ],
            [
            'Id_Company' => 10,
            'Name_Company' => 'LINKEDIN',
            'Email_Company' => 'contact' . '@linkedin.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo10' . '.png',
            'Id_City' => 10,
            ],
            [
            'Id_Company' => 11,
            'Name_Company' => 'CYBERTECH',
            'Email_Company' => 'contact' . '@cybertech.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo11' . '.png',
            'Id_City' => 11,
            ],
            [
            'Id_Company' => 12,
            'Name_Company' => 'CGI',
            'Email_Company' => 'contact' . '@cgi.com',
            'Phone_number_Company' => '0123456789',
            'Description_Company' => 'bar',
            'Siret_number_Company' => '12345678901234',
            'Logo_link_Company' => 'example.com/logo12' . '.png',
            'Id_City' => 12,
            ],
        ]);


        // Seeder pour la table offers
        DB::table('offers')->insert([
            [
            'Id_Offer' => 1,
            'Title_Offer' => 'Dev_C++',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 1,
            'Id_Account' => 1,
            'Id_Company' => 1,
            ],
            [
            'Id_Offer' => 2,
            'Title_Offer' => 'Dev_Web',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 1,
            'Id_Account' => 1,
            'Id_Company' => 1,
            ],
            [
            'Id_Offer' => 3,
            'Title_Offer' => 'Dev_PHP',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 2,
            'Id_Status' => 1,
            'Id_Account' => 1,
            'Id_Company' => 4,
            ],
            [
            'Id_Offer' => 4,
            'Title_Offer' => 'Dev_Laravel',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 2,
            'Id_Account' => 2,
            'Id_Company' => 3,
            ],
            [
            'Id_Offer' => 5,
            'Title_Offer' => 'Dev_C',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 2,
            'Id_Status' => 2,
            'Id_Account' => 2,
            'Id_Company' => 3,
            ],

            [
            'Id_Offer' => 6,
            'Title_Offer' => 'Dev_C++2',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 1,
            'Id_Account' => NULL,
            'Id_Company' => 1,
            ],
            [
            'Id_Offer' => 7,
            'Title_Offer' => 'Dev_Web2',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 1,
            'Id_Account' => NULL,
            'Id_Company' => 1,
            ],
            [
            'Id_Offer' => 8,
            'Title_Offer' => 'Dev_PHP2',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 2,
            'Id_Status' => 1,
            'Id_Account' => NULL,
            'Id_Company' => 4,
            ],
            [
            'Id_Offer' => 9,
            'Title_Offer' => 'Dev_Laravel2',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 1,
            'Id_Status' => 2,
            'Id_Account' => NULL,
            'Id_Company' => 3,
            ],
            [
            'Id_Offer' => 10,
            'Title_Offer' => 'Dev_C2',
            'Description_Offer' => 'foo',
            'Salary_Offer' => 50000,
            'Begin_date_Offer' => now()->subDays(30)->toDateString(),
            'Duration_Offer' => now()->addDays(30)->toDateString(),
            'Id_Category' => 2,
            'Id_Status' => 2,
            'Id_Account' => 3,
            'Id_Company' => 3,
            ],
            
        ]);

        // Seeder pour la table evaluates
        DB::table('evaluates')->insert([
            [
            'Id_Account' => 1,
            'Id_Company' => 1,
            'Rating' => 4.5,
            ],
            [
            'Id_Account' => 2,
            'Id_Company' => 1,
            'Rating' => 2.5,
            ],
            [
            'Id_Account' => 3,
            'Id_Company' => 1,
            'Rating' => 3.5,
            ],
            [
            'Id_Account' => 4,
            'Id_Company' => 1,
            'Rating' => 5.0,
            ],
            [
            'Id_Account' => 1,
            'Id_Company' => 2,
            'Rating' => 0.5,
            ],
            [
            'Id_Account' => 6,
            'Id_Company' => 5,
            'Rating' => 4.5,
            ],
            [
            'Id_Account' => 6,
            'Id_Company' => 1,
            'Rating' => 2.5,
            ],
            [
            'Id_Account' => 7,
            'Id_Company' => 3,
            'Rating' => 3.5,
            ],
            [
            'Id_Account' => 2,
            'Id_Company' => 3,
            'Rating' => 5.0,
            ],
            [
            'Id_Account' => 9,
            'Id_Company' => 1,
            'Rating' => 0.5,
            ],
        ]);

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
