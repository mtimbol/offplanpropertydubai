<?php

use App\Community;
use App\Country;
use App\Developer;
use App\Payment;
use App\Project;
use App\Type;
use Illuminate\Database\Seeder;

class DeveloperProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country  = Country::whereSlug('united-arab-emirates')->first();
        $community  = Community::whereSlug('dubai-marina')->first();

        $developer = factory(Developer::class)->create([
            'country_id'   => $country->id,
            'name'  => 'Dubai Properties',
            'slug'  => 'dubai-properties'
        ]);

        $project = factory(Project::class)->create([
            'developer_id'  => $developer->id,
            'name'  => 'Villanova',
            'title' => 'First time Mediterranean styled "Cluster Homes" in Dubailand',
            'slug'  => 'villanova'
        ]);

        // $project->searchable();

        $community->projects()->attach($project);

        $this->addProjectType($project);
        $this->addPaymentPlans($project);
	    $this->addBrochure($project);
        //
    }

    protected function addProjectType($project)
    {
    	$type = Type::findOrFail(1);
    	$project->types()->attach($type);
    }

    protected function addPaymentPlans($project)
    {
    	$payment = factory(Payment::class)->make([
	        'project_id'	=> $project->id,
	        'title'	=> '1st Installment',
	        'percentage'	=> '10%',
	        'date'	=> 'Purchase Date'
        ]);

	    $project->payments()->save($payment);

        $payment = factory(Payment::class)->make([
	        'project_id'	=> $project->id,
	        'title'	=> '2nd Installment',
	        'percentage'	=> '5%',
	        'date'	=> '15th April 2017',
       	]);

        $project->payments()->save($payment);

        $payment = factory(Payment::class)->make([
 	    	'project_id'	=> $project->id,
 	    	'title'	=> '3rd Installment',
 	        'percentage'	=> '5%',
 	        'date'	=> '15th October 2017',
        ]);
        
        $project->payments()->save($payment);

        $payment = factory(Payment::class)->make([
 	        'project_id'	=> $project->id,
 	        'title'	=> '4th Installment',
 	        'percentage'	=> '5%',
 	        'date'	=> '15th April 2018',
        ]);
        
        $project->payments()->save($payment);
    }

    protected function addBrochure($project)
    {
        factory(App\Brochure::class)->create([
            'project_id'    => $project->id
        ]);
    }

}
