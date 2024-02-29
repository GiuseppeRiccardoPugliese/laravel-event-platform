<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()
            ->count(20)
            ->create()
            ->each(function ($event) {

                $tags = Tag::inRandomOrder()->first();
                $event->tags()->attach($tags);
                $event->save();
            });
    }
}
