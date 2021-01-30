<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Blouse', //1
            'image_url' => 'blouse.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Shirt',  //2
            'image_url' => 'shirt.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Skirt',  //3
            'image_url' => 'half circle skirt.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Frock',  //4
            'image_url' => 'frock.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Trouser',    //5
            'image_url' => 'trouser.jpg',
        ]);
        DB::table('categories')->insert([
            'name' => 'Jacket/ Coat/ Blaze',    //6
            'image_url' => 'Coat.jpg',
        ]);
    }
}
