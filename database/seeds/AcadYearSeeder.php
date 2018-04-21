<?php

use Illuminate\Database\Seeder;

use App\AcadYear;

class AcadYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcadYear::create([
            'year' => '2010-2011',
            'semester' => '1st Semester',
            'status' => 1
        ]);
    }
}
