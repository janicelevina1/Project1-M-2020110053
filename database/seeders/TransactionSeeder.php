<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'type' => ['income', 'expense'],
            'category' => ['wage, bonus, gift', 'foof & drinks shopping, charity, housing, insurance, taxes, transportation'],
            'currency' => [10000, 15000],
        ];

        $faker = Faker::create();

        for($i = 0;$i < 100;$i++){
            if($i%2){
                DB::table('transactions')->insert([
                    'amount' => $data['currency'][0],
                    'type' => $data['type'][0],
                    'category' => $data['category'][0],
                    'notes' => $faker->paragraph,
                ]);
            }else{
                DB::table('transactions')->insert([
                    'amount' => $data['currency'][1],
                    'type' => $data['type'][1],
                    'category' => $data['category'][1],
                    'notes' => $faker->paragraph,
                ]);
            }
        }
    }
}
