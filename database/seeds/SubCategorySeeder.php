<?php

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'name' => 'Sleeveless Blouse',  //1
            'category_id' => 1,
            'tailor_cost' => 400,
            'amount_of_cloth' => 1.00,
            'image_url' => 'Sleeveless Blouse.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Short Sleeve Blouse',    //2
            'category_id' => 1,
            'tailor_cost' => 550,
            'amount_of_cloth' => 1.50,
            'image_url' => 'Short Sleeve Blouse.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Long Sleeve Blouse', //3
            'category_id' => 1,
            'tailor_cost' => 500,
            'amount_of_cloth' => 2.00,
            'image_url' => 'Wester top.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Short Sleeve Shirt',   //4
            'category_id' => 2,
            'tailor_cost' => 550,
            'amount_of_cloth' => 2.00,
            'image_url' => 'short sleeve shirt.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Long Sleeve Shirt',    //5
            'category_id' => 2,
            'tailor_cost' => 650,
            'amount_of_cloth' => 2.50,
            'image_url' => 'shirt.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Half Circle Skirt',   //6
            'category_id' => 3,
            'tailor_cost' => 500.00,
            'amount_of_cloth' => 1.50,
            'image_url' => 'half circle skirt.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Tight Skirt', //7
            'category_id' => 3,
            'tailor_cost' => 350.00,
            'amount_of_cloth' => 1.00,
            'image_url' => 'tight skirt.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Dress with Gathers', //8
            'category_id' => 4,
            'tailor_cost' => 800.00,
            'amount_of_cloth' => 3.00,
            'image_url' => 'Dress with gathers.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Line Dress',   //9
            'category_id' => 4,
            'tailor_cost' => 850.00,
            'amount_of_cloth' => 3.00,
            'image_url' => 'A line dress.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Princess Line Dresss',    //10
            'category_id' => 4,
            'tailor_cost' => 900.00,
            'amount_of_cloth' => 3.50,
            'image_url' => 'Princess line dress.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Sleevelsess Peplum top', //11
            'category_id' => 1,
            'tailor_cost' => 550.00,
            'amount_of_cloth' => 2.00,
            'image_url' => 'sleeveless peplum top.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Peplum top', //12
            'category_id' => 1,
            'tailor_cost' => 600.00,
            'amount_of_cloth' => 2.50,
            'image_url' => 'Peplum top with sleeve.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Tunics, tops, kurta',    //13
            'category_id' => 1,
            'tailor_cost' => 800.00,
            'amount_of_cloth' => 2.50,
            'image_url' => 'Kurta top.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Gathered Skirt', //14
            'category_id' => 3,
            'tailor_cost' => 600.00,
            'amount_of_cloth' => 3.00,
            'image_url' => 'gathered skirt.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Trouser', //15
            'category_id' => 5,
            'tailor_cost' => 1500.00,
            'amount_of_cloth' => 2.00,
            'image_url' => 'trouser.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Short Trouser', //16
            'category_id' => 5,
            'tailor_cost' => 1500.00,
            'amount_of_cloth' => 1.50,
            'image_url' => 'short trouser.jpg'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Boss By Hugo Boss Brown Wool Blend Blaze', //17
            'category_id' => 6,
            'tailor_cost' => 29500.00,
            'amount_of_cloth' => 4.00,
            'image_url' => 'Coat -Boss By Hugo Boss Brown Wool Blend Blaze.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Boss By Hugo Boss Vintage Brown Wool Tailored Rossellini', //18
            'category_id' => 6,
            'tailor_cost' => 22000.00,
            'amount_of_cloth' => 4.00,
            'image_url' => 'Coat -Boss By Hugo Boss Vintage Brown Wool Tailored Rossellini.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Single-breasted regular-fit cotton-blend coat', //19
            'category_id' => 6,
            'tailor_cost' => 63000.00,
            'amount_of_cloth' => 4.00,
            'image_url' => 'Coat-Single-breasted regular-fit cotton-blend coat.JPG'
        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Raye Slim-Fit Unstructured Wool, Linen and Silk-Blend Blazer', //20
            'category_id' => 6,
            'tailor_cost' => 100000.00,
            'amount_of_cloth' => 4.00,
            'image_url' => 'Coat- Raye Slim-Fit Unstructured Wool, Linen and Silk-Blend Blazer.JPG'
        ]);
    }
}
