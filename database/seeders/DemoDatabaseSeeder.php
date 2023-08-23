<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->users();
        $this->categories();
        $this->products();
    }

    private function users()
    {
        User::create([
            'role' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0188885555222',
            'password' => 12345678,
        ]);

        User::create([
            'role' => 'user',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'user@gmail.com',
            'phone' => '0188885555255',
            'password' => 12345678,
        ]);
    }

    private function categories()
    {
        $categories = [
            'Laptops & Computers',
            'Smartphones',
            'Accessories',
            'Audio & Headphones',
            'Cameras & Photography',
            'TV & Home Entertainment',
            'Gaming Consoles & Accessories',
            'Wearable Technology',
            'Home Appliances',
            'Tablets',
            'Networking & Internet Devices',
            'Printers & Scanners',
            'Office Electronics',
            'Smart Home Devices',
            'Car Electronics',
            'Health & Personal Care Electronics',
            'Tech Gadgets',
            'Components & DIY Electronics',
            'Electronics for Kids',
            'Musical Instruments & Gear'
        ];

        foreach($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }        
    }

    private function products()
    {
        $products = [
            'Premium Laptop X1',
            'Ultra-Portable Smartphone Z2',
            'Wireless Bluetooth Earbuds',
            'Professional DSLR Camera 500',
            'Smart 4K LED TV 55"',
            'Gaming Console Elite X',
            'Fitness Tracker Pro 3',
            'Robotic Vacuum Cleaner',
            'Convertible Tablet Pro 12',
            'High-Speed Wireless Router',
            'Inkjet Printer Plus 200',
            'Noise-Canceling Headphones',
            'Home Security Camera Kit',
            'Smart Plug Control Hub',
            'Car Dash Cam Pro 1080',
            'Health Monitoring Smartwatch',
            'USB-C Multiport Adapter',
            'DIY Electronics Starter Kit',
            'Educational Kids Tablet',
            'Acoustic Guitar Deluxe',
            'Stylish Laptop Backpack',
            'Wireless Charging Pad',
            'Portable Bluetooth Speaker',
            'Smart Home Lighting Kit',
            'Gaming Mouse Precision X',
            'Professional Studio Microphone',
            'Streaming Media Player',
            'Compact Espresso Machine',
            'Wireless Keyboard with Touchpad',
            'Virtual Reality Headset VR500',
            'Wireless Surround Sound System',
            'Ultra-Thin Laptop Sleeve',
            'High-Capacity Power Bank',
            'Outdoor Wireless Security Camera',
            'Wireless Ergonomic Mouse',
            'Smart Wi-Fi Thermostat',
            'Digital Drawing Tablet',
            'HD Webcam for Video Calls',
            'Smart Doorbell with Camera',
            'Smart Scale Body Analyzer',
            'Bluetooth Car Stereo System',
            'Wireless Charging Stand',
            'Gaming Keyboard Backlit',
            'Cordless Handheld Vacuum',
            'Professional DJ Controller',
            'Smart Home Voice Assistant',
            'Wireless Sport Earphones',
            'Mini Projector Portable',
            'Multifunction Laser Printer',
            'Compact Bluetooth Speaker',
            'Portable Photo Printer',
        ];

        $faker = Faker::create();
        
        foreach($products as $product) {
            Product::create([
                'category_id' => rand(1, 20),
                'name' => $product,
                'slug' => Str::slug($product),
                'price' => 1000,
                'image' => 'assets/images/items/default.jpg',
                'description' => $faker->paragraph(5),
            ]);
        }
    }
}
