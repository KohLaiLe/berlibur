<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [[
            'name' => 'Raja Ampat',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
            'price' => '10990000',
            'year' => '2022',
            'image' => 'dummy1.jpg'
        ],[
                'name' => 'Labuan Bajo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '5590000',
                'year' => '2022',
                'image' => 'dummy2.jpg'
        ],[
                'name' => 'Danau Toba',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '3790000',
                'year' => '2022',
                'image' => 'dummy3.jpg'
        ],[
                'name' => 'Gunung Bromo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '2290000',
                'year' => '2022',
                'image' => 'dummy4.jpg'
        ],[
                'name' => 'Kota Tua Jakarta',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '190000',
                'year' => '2022',
                'image' => 'dummy5.jpg'
        ],[
                'name' => 'Pulau Komodo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '3590000',
                'year' => '2022',
                'image' => 'dummy6.jpg'
        ],[
                'name' => 'Candi Borobudur',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '1259000',
                'year' => '2022',
                'image' => 'dummy7.jpg'
        ],[
                'name' => 'Pulo Cinta',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '790000',
                'year' => '2022',
                'image' => 'dummy8.jpg'
        ],[
                'name' => 'Uluwatu',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '12390000',
                'year' => '2022',
                'image' => 'dummy9.jpg'
        ],[
                'name' => 'Taman Sari Yogyakarta',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultricies volutpat velit in mattis. Sed iaculis, metus vitae tristique mattis, lacus tortor tincidunt magna, vitae volutpat nisl mauris non risus. Maecenas auctor tristique sapien, sit amet suscipit neque iaculis pulvinar. Fusce scelerisque massa quam, ac semper augue varius molestie. Pellentesque.',
                'price' => '7990000',
                'year' => '2022',
                'image' => 'dummy10.jpg'
        ]];

        Product::insert($products);
    }
}
