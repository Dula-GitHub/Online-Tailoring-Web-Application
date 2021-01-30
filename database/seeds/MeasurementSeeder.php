<?php

use Illuminate\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measurements')->insert([
            'name' => 'Neck girth', //1
            'label' => 'neck_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Chest girth',    //2
            'label' => 'chest_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Waist girth',    //3
            'label' => 'waist_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Hip girth',  //4
            'label' => 'hip_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bicep girth',    //5
            'label' => 'bicep_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'First Forearm girth',    //6
            'label' => 'first_forearm_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Wrist girth',    //7
            'label' => 'wrist_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder slope length',  //8
            'label' => 'shoulder_slope_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Sleeve length',  //9
            'label' => 'sleeve_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Breast height',  //10
            'label' => 'breast_height'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shirt length',   //11
            'label' => 'shirt_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Length to the hip (front)',  //12
            'label' => 'length_to_the_hip'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder length',    //13
            'label' => 'shoulder_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Waist Circumference',    //14
            'label' => 'waist_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Upper Hip Circumference',    //15
            'label' => 'upper_hip_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Lower Hip Circumference',    //16
            'label' => 'lower_hip_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Waist to Lower Hip', //17
            'label' => 'waist_to_lower_hip'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Skirt Length',   //18
            'label' => 'skirt_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder to Waist',  //19
            'label' => 'shoulder_to_waist'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Upper Bust', //20
            'label' => 'upper_bust'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bust',   //21
            'label' => 'bust'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Under Bust', //22
            'label' => 'under_bust'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder to Apex',   //23
            'label' => 'shoulder_to_apex'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Upper Arm',  //24
            'label' => 'upper_arm'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Apex to Apex',   //25
            'label' => 'apex_to_apex'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Sleeve Circumference',   //26
            'label' => 'sleeve_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bust Circumference', //27
            'label' => 'bust_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bodice length',  //28
            'label' => 'bodice_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Back width', //29
            'label' => 'back_width'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Armpit girth',   //30
            'label' => 'armpit_girth'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Hip Circumference',  //31
            'label' => 'hip_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Neckline Circumference',  //32
            'label' => 'neckline_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Armhole Circumference',  //33
            'label' => 'armhole_circumference'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder Width', //34
            'label' => 'shoulder_width'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bust Height',    //35
            'label' => 'bust_height'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Tunic Front Length',    //36
            'label' => 'tunic_front_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Tunic Back Length',    //37
            'label' => 'tunic_back_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Neckline Drop',    //38
            'label' => 'neckline_drop'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Collar',    //39
            'label' => 'collar'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Chest',    //40
            'label' => 'chest'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shirt Waist',    //41
            'label' => 'shirt_waist'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Hip',    //42
            'label' => 'hip'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bicep',    //43
            'label' => 'bicep'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Cuff',    //44
            'label' => 'cuff'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Yoke',    //45
            'label' => 'yoke'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Back Length',    //46
            'label' => 'back_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Waist',    //47
            'label' => 'waist'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Pants out seam',    //48
            'label' => 'pants_out_seam'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Inseam',    //49
            'label' => 'inseam'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Thigh',    //50
            'label' => 'thigh'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Knee',    //51
            'label' => 'knee'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Bottom',    //52
            'label' => 'bottom'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Crotch',    //53
            'label' => 'crotch'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Jacket waist',    //54
            'label' => 'jacket_waist'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Front Length',    //55
            'label' => 'front_length'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Shoulder',    //56
            'label' => 'shoulder'
        ]);
        DB::table('measurements')->insert([
            'name' => 'Around the neck',    //57
            'label' => 'around_the_neck'
        ]);
    }
}
