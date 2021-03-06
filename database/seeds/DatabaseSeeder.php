<?php

use App\Category;
use App\Community;
use App\Project;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Mark Timbol',
            'email' => 'mark@timbol.com',
            'password'  => bcrypt('marktimbol')
        ]);

        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CommunitiesTableSeeder::class);
        $this->call(DeveloperProjectsTableSeeder::class);
        
        $dubaiMarina = Community::whereSlug('dubai-marina')->first();
        $dubaiMarinaProjects = factory(Project::class, 20)->create();
        $dubaiMarina->projects()->attach($dubaiMarinaProjects);

        $alBarsha = Community::whereSlug('al-barsha')->first();
        $alBarshaProjects = factory(Project::class, 20)->create();
        $alBarsha->projects()->attach($alBarshaProjects);
    }
}
