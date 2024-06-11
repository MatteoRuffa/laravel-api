<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $projects = Project::all();
        $technologies = Technology::all();

        foreach ($projects as $project) {
            $randomTechnologies = $technologies->random(rand(1, $technologies->count()));
            
            foreach ($randomTechnologies as $technology) {
                DB::table('project_technology')->insert([
                    'project_id' => $project->id,
                    'technology_id' => $technology->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
