<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods =
        [
            ['name'=>'bKash'],
            ['name'=>'Nagad'],
            ['name'=>'Rocket'],
            ['name'=>'Cash'],
            ['name'=>'Check'],
        ];
        DB::table('payment_methods')->insert($methods);
    }
}
