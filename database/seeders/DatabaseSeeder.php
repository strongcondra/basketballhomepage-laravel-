<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::select("INSERT INTO 
            competitions(title,created_at,updated_at)
            VALUES
            ('Afahye',now(),now()),
            ('National Championship',now(),now()),
            ('Regional Leagues',now(),now()),
            ('GES Championship',now(),now()),
            ('GHATUSA Championship',now(),now()),
            ('Academies',now(),now()),
            ('3x3',now(),now()),
            ('U16',now(),now()),
            ('U18',now(),now()),
            ('U23',now(),now()),
            ('Wheelchair',now(),now()),
            ('Deaf',now(),now()),
            ('Children',now(),now()),
            ('Community Tournaments',now(),now()),
            ('International Competitions',now(),now())
            ");

            DB::select("INSERT INTO 
            role(name,parent_id,checked,node)
            VALUES
            ('Page',0,0,1),
            ('Constituent',1,0,2),
            ('National Teams',1,0,2),
            ('Competitions',1,0,2),
            ('Leagues',4,0,3),
            ('Tournaments',4,0,3),
            ('Technical',1,0,2),
            ('Coaches',7,0,3),
            ('Table Officials',7,0,3),
            ('Referees',7,0,3),
            ('Infrastructure',1,0,2),
            ('League Center',11,0,3),
            ('Training Center',11,0,3),
            ('School',11,0,3),
            ('Event',1,0,2),
            ('News',1,0,2),
            ('Gallery',1,0,2),
            ('Partners',1,0,2),
            ('Government',18,0,3),
            ('Development Partners',18,0,3),
            ('Corporate',18,0,3),
            ('Ambassadors',18,0,3),
            ('Governance',1,0,2),
            ('Board',23,0,3),
            ('Commissions',23,0,3),
            ('Committee',23,0,3),
            ('About Us',1,0,2),
            ('Executives',27,0,3),
            ('Contact Details',27,0,3)

            ");
    }
}
