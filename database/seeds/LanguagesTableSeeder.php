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
            ['name' =>'Php'],
            ['name' =>'Javascript'],
            ['name' =>'Go'],
            ['name' =>'Bash'],
        ]);
        $languages->each(function($language) {
            Language::create($language);
        });
    }
}
