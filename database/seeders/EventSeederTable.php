<?php

namespace Database\Seeders;
use App\Models\User;
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
            ->make() //NELLA relazione ONE to MANY si utilizza il make()
                    //NELLA relazione MANY to MANY si utilizza il create
            ->each(function ($event) {

                $user = User::inRandomOrder()->first();
                $event -> user() -> associate($user);

                $event->save();

                $tags = Tag::inRandomOrder()->take(3)->get();
                $event->tags()->attach($tags);
            });
    }
}
