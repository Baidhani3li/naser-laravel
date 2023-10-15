<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Asset;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $com = Company::query()->create([
            'name' => 'Shehab Company',
        ]);


        $br1 = Branch::query()->create([
            'name'=> 'shehab branch 1',
            'company_id' => $com->id,
        ]);

        $br2 = Branch::query()->create([
            'name'=> 'shehab branch 2',
            'company_id' => $com->id,
        ]);


         User::factory(5)->create([
             'branch_id' => $br1->id,
         ]);

        User::factory(5)->create([
            'branch_id' => $br2->id,
        ]);

        User::query()->first()->update([
            'email' => 'naser@test.com',
        ]);
        for($i = 1; $i<= 20; $i++){

            Asset::query()->create([
                'branch_id' => fake()->boolean ? $br1->id : $br2->id,
                'type' => fake()->boolean ? 1 : 2,
            ]);
        }


    }
}
