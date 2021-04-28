<?php

namespace Database\Seeders;

use App\Models\Screencast\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'HTML', 'CSS', 'Javascript', 'PHP', 'Laravel', 'Codeigniter', 'Python', 'Django', 'Tailwind CSS', 'React'
        ]);

        $tags->each(function ($tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        });
    }
}
