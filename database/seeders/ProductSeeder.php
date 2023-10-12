<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product;
        $product->code = "P001";
        $product->name = "Indomaret Facial Tissue 2 Ply (2+1) 3X180's";
        $product->price = 22500;
        $product->default_discount = 0;
        $product->save();

        $product = new Product;
        $product->code = "P002";
        $product->name = "Sayang Deterjen Liquid Konsentrat Rose 750mL";
        $product->price = 20500;
        $product->default_discount = 10;
        $product->save();

        $product = new Product;
        $product->code = "B001";
        $product->name = "Gulaku Gula Tebu (Kuning) 1000G";
        $product->price = 14500;
        $product->default_discount = 30;
        $product->save();

        $product = new Product;
        $product->code = "B002";
        $product->name = "Rose Brand Gula Pasir Putih 1Kg";
        $product->price = 14500;
        $product->default_discount = 10;
        $product->save();

        $product = new Product;
        $product->code = "B003";
        $product->name = "Tropical Minyak Goreng 2000Ml";
        $product->price = 35000;
        $product->default_discount = 3;
        $product->save();
    }
}
