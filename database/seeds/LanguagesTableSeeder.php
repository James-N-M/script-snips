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
            ['name' =>'haskell'],
        ]);
        $languages->each(function($language) {
            Language::create($language);
        });
    }
}
