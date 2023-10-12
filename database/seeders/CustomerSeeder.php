<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new Customer;
        $customer->code = 'U001';
        $customer->name = 'Asep Subekti';
        $customer->address = 'Jl. Surabaya-Sidoarjo, Surabaya, Jawa Timur';
        $customer->phone_no = '089089089089';
        $customer->city = "Surabaya";
        $customer->save();

        $customer = new Customer;
        $customer->code = 'U002';
        $customer->name = 'Cikini Birato';
        $customer->address = 'Jl. Surabaya-Sidoarjo, Cirebon, Jawa Barat';
        $customer->phone_no = '0987098760987';
        $customer->city = "Cirebon";
        $customer->save();

        $customer = new Customer;
        $customer->code = 'U003';
        $customer->name = 'Arnold Wijaya';
        $customer->address = 'Jl. Surabaya-Sidoarjo, Jakarta Barat, D.K.I. Jakarta';
        $customer->phone_no = '0987098760987';
        $customer->city = "Jakarta Barat";
        $customer->save();
    }
}
