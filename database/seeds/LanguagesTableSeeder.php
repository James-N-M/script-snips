<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = collect([
            ['name' =>'php'],
            ['name' =>'javascript'],
            ['name' =>'go'],
            ['name' =>'bash'],
            ['name' =>'python'],
            ['name' =>'java'],
            ['name' =>'c++'],
            ['name' =>'sql'],
            ['name' =>'ruby'],
            ['name' =>'c#'],
            ['name' =>'swift'],
            ['name' =>'objective-c'],
            ['name' =>'mysql'],
            ['name' =>'sql-plus'],
            ['name' =>'miranda'],
            ['name' =>'ada'],
            ['name' =>'html'],
            ['name' =>'css'],
            ['name' =>'c'],
            ['name' =>'crystal'],
            ['name' =>'perl'],
            ['name' =>'postscript'],
            ['name' =>'r'],
            ['name' =>'cobal'],
            ['name' =>'xml'],
            ['name' =>'prolog'],
            ['name' =>'scala'],
        ]);
        $languages->each(function($language) {
            Language::create($language);
        });
    }
}
