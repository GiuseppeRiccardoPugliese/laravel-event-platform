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
            ->create() //NELLA relazione ONE to MANY si utilizza il make()
            ->each(function ($event) {

                $tags = Tag::inRandomOrder()->take(3)->get();
                $event->tags()->attach($tags);
            });
    }
}
