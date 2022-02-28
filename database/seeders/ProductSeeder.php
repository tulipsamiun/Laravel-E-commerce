<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
            'name' => 'LG Monitor',
            'price' => '300',
            'category' => 'Monitor',
            'description' => 'LG 22MK400H-B Monitor With Full HD Display',
            'gallery' => 'https://www.lg.com/in/images/monitors/md06062696/gallery/Desktop-03.jpg'
            ],
            [
            'name' => 'Smart Tv',
            'price' => '4480',
            'category' => 'TV',
            'description' => '4,460 Smart Tv Stock - iStock',
            'gallery' => 'https://media.istockphoto.com/photos/contemporary-curved-led-smart-tv-design-picture-id467946398?k=20&m=467946398&s=612x612&w=0&h=eJogJbyheVPx4Pv6lgcPf7VW6eBXGHXFbCC-i9kCGCA='
            ],
            [
            'name' => 'Laptop Computers',
            'price' => '4800',
            'category' => 'Laptop',
            'description' => 'Laptop Computers, Acer Chromebooks & 2-in-1 Laptops',
            'gallery' => 'https://static.acer.com/up/Resource/Acer/Laptops/Swift_1/Image/20200707/Acer-Swift-1_SF114-33_Gold_modelmain.png'
            ]
        ]);
    }
}
