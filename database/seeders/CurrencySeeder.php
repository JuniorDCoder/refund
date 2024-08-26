<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $currencies = [
            'EUR',
            'JPY',
            'GBP',
            'AUD',
            'CAD',
            'CHF',
            'CNY',
            'SEK',
            'NZD',
            'MXN',
            'SGD',
            'HKD',
            'NOK',
            'KRW',
            'TRY',
            'RUB',
            'INR',
            'BRL',
            'ZAR',
            'DKK',
            'PLN',
            'THB',
            'IDR',
            'HUF',
            'USD',
        ];

        foreach ($currencies as $currency) {
            // Assuming you want to update all users to a specific currency based on some logic
            // For demonstration, this will set all users to USD
            User::query()->update(['currency' => $currency]);
        }
    }
}
