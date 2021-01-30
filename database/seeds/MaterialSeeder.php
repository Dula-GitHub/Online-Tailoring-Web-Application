<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'Cotton Silk',    //1
            'unit_price' => 1300.00,
            'image_url' => 'cotton_silk.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Viscose',    //2
            'unit_price' => 400.00,
            'image_url' => 'Viscose.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Cotton Printed',    //3
            'unit_price' => 600.00,
            'image_url' => 'Cotton Printed.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Crepe Chiffon',  //4
            'unit_price' => 500.00,
            'image_url' => 'crepe_chiffon.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Chiffon Printed',  //5
            'unit_price' => 600.00,
            'image_url' => 'chiffon_printed.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Chinese Popline 36"',  //6
            'unit_price' => 140.00,
            'image_url' => 'Chinese_Popline.jpeg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Cotton Shirting 58"',  //7
            'unit_price' => 1500.00,
            'image_url' => 'cotton_shirting.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Printed Linen 60"',  //8
            'unit_price' => 1750.00,
            'image_url' => 'printed_linen.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Superfine Linen 36"',  //9
            'unit_price' => 1800.00,
            'image_url' => 'superfine_linen.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Pure Linen 60"',  //10
            'unit_price' => 2750.00,
            'image_url' => 'Pure Linen.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Mid Blue Cotton 58"',  //11
            'unit_price' => 1950.00,
            'image_url' => 'Mid Blue Cotton.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Brocade 44"',  //12
            'unit_price' => 1500.00,
            'image_url' => 'Brocade.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'German Crepe 45"',  //13
            'unit_price' => 800.00,
            'image_url' => 'crepe.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Lame 45"',  //14
            'unit_price' => 800.00,
            'image_url' => 'lame.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Stripe Rib Spandex',  //15
            'unit_price' => 700.00,
            'image_url' => 'Stripe Rib Spandex.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Poly Span Jersey Knit Thick Ribbed Rib',  //16
            'unit_price' => 1600.00,
            'image_url' => 'rib.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'HANDLOOM RAW COTTON',  //17
            'unit_price' => 1300.00,
            'image_url' => 'handloom_yellow.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'CHIFFON EMBROIDERED',  //18
            'unit_price' => 2950.00,
            'image_url' => 'chiffon_Embroidered_.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Navy Blue Wool & Cashmere Blend 59"',  //19
            'unit_price' => 750.00,
            'image_url' => 'Navy Blue Wool & Cashmere Blend.webp'
        ]);
        DB::table('materials')->insert([
            'name' => 'Cotton Cavalry Twill Fabric',  //20
            'unit_price' => 750.00,
            'image_url' => 'Cotton Cavalry Twill Fabric.jpg'
        ]);
        DB::table('materials')->insert([
            'name' => 'Hugo Boss Italy',  //21
            'unit_price' => 1900.00,
            'image_url' => 'Hugo Boss Italy- silk material.jpg'
        ]);
        
        
        
        
        
    }
}
