<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WayPaymentsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $payment_credit = 'Cartão de Crédito';
        $payment_slip = 'Boleto Bancário';
        
        $registers = DB::table('way_payments')
                ->where('name', '=', $payment_credit)
                ->orWhere('name', '=', $payment_slip)
                ->exists();
        if (!$registers) {
            DB::table('way_payments')->insert([
                ['name' => $payment_credit],
                ['name' => $payment_slip]
            ]);
        }
    }

}
