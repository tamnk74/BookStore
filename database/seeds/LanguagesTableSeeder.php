<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            'Tiếng Việt',
            'Tiếng Anh'
        ];
        foreach ($languages as $language)
            Language::create([
                'name' => $language,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
    }
}
