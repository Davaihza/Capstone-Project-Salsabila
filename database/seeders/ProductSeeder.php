<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Menu Makanan
            [
                'name' => 'Nasgor Kebuli Katsu',
                'category' => 'Food',
                'price' => 20000,
                'image' => 'images/Nasgor_Kebuli_Katsu.jpg',
            ],
            [
                'name' => 'Nasgor Kebuli Ayam',
                'category' => 'Food',
                'price' => 16000,
                'image' => 'images/Nasgor_Kebuli_Ayam.jpg',
            ],
            [
                'name' => 'Nasi Mie Goreng Ayam Geprek',
                'category' => 'Food',
                'price' => 19000,
                'image' => 'images/Nasi_Mie_Goreng_Ayam_Geprek.jpg',
            ],
            [
                'name' => 'Nasi Mie Goreng Ayam Bakar',
                'category' => 'Food',
                'price' => 19000,
                'image' => 'images/Nasi_Mie_Goreng_Ayam_Bakar.jpg',
            ],
            [
                'name' => 'Nasi Mie Goreng Ayam Goreng',
                'category' => 'Food',
                'price' => 19000,
                'image' => 'images/Nasi_Mie_Goreng_Ayam_Goreng.jpg',
            ],
            [
                'name' => 'Nasi Katsu Salad',
                'category' => 'Food',
                'price' => 17000,
                'image' => 'images/Nasi_Katsu_Salad.jpg',
            ],
            [
                'name' => 'Nasi Katsu',
                'category' => 'Food',
                'price' => 15000,
                'image' => 'images/Nasi_Katsu.jpg',
            ],
            [
                'name' => 'Nasi Ayam Geprek Gobyos',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Ayam_Geprek_Gobyos.jpg',
            ],
            [
                'name' => 'Nasi Ayam Penyet Bakar',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Ayam_Penyet_Bakar.jpg',
            ],
            [
                'name' => 'Nasi Ayam Penyet Goreng',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Ayam_Penyet_Goreng.jpg',
            ],
            [
                'name' => 'Nasi Lele Penyet',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Lele_Penyet.jpg',
            ],
            [
                'name' => 'Nasi SFC',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_SFC.jpg',
            ],
            [
                'name' => 'Nasi Soto Babat',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Soto_Babat.jpg',
            ],
            [
                'name' => 'Nasi Soto Ayam',
                'category' => 'Food',
                'price' => 13000,
                'image' => 'images/Nasi_Soto_Ayam.jpg',
            ],

            // Menu Minuman
            [
                'name' => 'Chocolatos Drink',
                'category' => 'Drink',
                'price' => 7000,
                'image' => 'images/Chocolatos_Drink.jpg',
            ],
            [
                'name' => 'Jeruk Susu (Es/Hangat)',
                'category' => 'Drink',
                'price' => 7000,
                'image' => 'images/Jeruk_Susu.jpg',
            ],
            [
                'name' => 'Jeruk (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Jeruk.jpg',
            ],
            [
                'name' => 'Teh Susu (Es/Hangat)',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Teh_Susu.jpg',
            ],
            [
                'name' => 'Kuku Bima Susu Es',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Kuku_Bima_Susu_Es.jpg',
            ],
            [
                'name' => 'Extra Joss Susu Es',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Extra_Joss_Susu_Es.jpg',
            ],
            [
                'name' => 'Es Laguna Salsabilla',
                'category' => 'Drink',
                'price' => 7000,
                'image' => 'images/Es_Laguna_Salsabila.jpg',
            ],
            [
                'name' => 'Hillo (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Hilo.jpg',
            ],
            [
                'name' => 'Susu Putih (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Susu_Putih.jpg',
            ],
            [
                'name' => 'Susu Coklat (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Susu_Cokelat.jpg',
            ],
            [
                'name' => 'Cappuccino (Es/Hangat)',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Cappucino.jpg',
            ],
            [
                'name' => 'Lemon Tea (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Lemon_Tea.jpg',
            ],
            [
                'name' => 'Orange Squash',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Orange_Squash.jpg',
            ],
            [
                'name' => 'Teh Tarik (Es/Hangat)',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Teh_Tarik.jpg',
            ],
            [
                'name' => 'Teh Leci (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Teh_Leci.jpg',
            ],
            [
                'name' => 'Teh Melon (Es/Hangat)',
                'category' => 'Drink',
                'price' => 6000,
                'image' => 'images/Teh_Melon.jpg',
            ],
            [
                'name' => 'Teh Mangga (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Teh_Mangga.jpg',
            ],
            [
                'name' => 'Kopi Hitam',
                'category' => 'Drink',
                'price' => 3000,
                'image' => 'images/Kopi_Hitam.jpg',
            ],
            [
                'name' => 'Teh Manis (Es/Hangat)',
                'category' => 'Drink',
                'price' => 3000,
                'image' => 'images/Teh_Manis.jpg',
            ],
            [
                'name' => 'Teh Tawar (Es/Hangat)',
                'category' => 'Drink',
                'price' => 2000,
                'image' => 'images/Teh_Tawar.jpg',
            ],
            [
                'name' => 'Es Batu',
                'category' => 'Drink',
                'price' => 2000,
                'image' => 'images/Es_Batu.jpg',
            ],
            [
                'name' => 'Air Mineral 1,5L',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Air_Mineral_1,5_L.jpg',
            ],
            [
                'name' => 'Air Mineral 300ml',
                'category' => 'Drink',
                'price' => 3000,
                'image' => 'images/Air_Mineral_300_ml.jpg',
            ],
            [
                'name' => 'Aneka Nutrisari (Es/Hangat)',
                'category' => 'Drink',
                'price' => 5000,
                'image' => 'images/Aneka_Nutrisari.jpg',
            ],

            // Menu Tambahan
            [
                'name' => 'Telor Dadar/Ceplok',
                'category' => 'Snack',
                'price' => 4000,
                'image' => 'images/Telor_Dadar.jpg',
            ],
            [
                'name' => 'Krupuk Udang',
                'category' => 'Snack',
                'price' => 5000,
                'image' => 'images/Kerupuk_Udang.jpg',
            ],
            [
                'name' => 'Peyek',
                'category' => 'Snack',
                'price' => 3000,
                'image' => 'images/Peyek.jpg',
            ],
            [
                'name' => 'Tahu/Tempe Goreng',
                'category' => 'Snack',
                'price' => 1000,
                'image' => 'images/Tahu_Goreng.jpg',
            ],
            [
                'name' => 'Mendoan/Bala-Bala',
                'category' => 'Snack',
                'price' => 1000,
                'image' => 'images/Mendoan.jpg',
            ],
            [
                'name' => 'Kol/Terong Goreng',
                'category' => 'Snack',
                'price' => 4000,
                'image' => 'images/Kol_Goreng.jpg',
            ],
            [
                'name' => 'Nasi',
                'category' => 'Snack',
                'price' => 5000,
                'image' => 'images/Nasi.jpg',
            ],
            [
                'name' => 'Sambal',
                'category' => 'Snack',
                'price' => 3000,
                'image' => 'images/Sambal.jpg',
            ],
            [
                'name' => 'Bacem Tahu/Tempe',
                'category' => 'Snack',
                'price' => 1000,
                'image' => 'images/Bacem.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
