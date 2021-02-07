<?php

use Illuminate\Database\Seeder;

use App\Task;
use App\Typology;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Typology::class, 50)
          -> create()
          -> each(function($typo) {

            $tasks = Task::inRandomOrder()
                  -> limit(5) -> get();

            $typo -> tasks() -> attach($tasks);
          });
    }
}
