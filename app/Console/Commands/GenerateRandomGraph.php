<?php

namespace App\Console\Commands;
use Faker\Factory as Faker;

use Illuminate\Console\Command;
use App\Repositories\GraphRepositoryInterface;
use App\Repositories\NodeRepositoryInterface;

class GenerateRandomGraph extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:gen {--nbNodes=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generate a random graph with nbNodes nodes';
	private $graphRepository;
	private $nodeRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GraphRepositoryInterface $graphRepository,NodeRepositoryInterface $nodeRepository )
    {
        parent::__construct();
		$this->graphRepository=$graphRepository;
		$this->nodeRepository=$nodeRepository;
		
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		    $nbNodes  = $this->option('nbNodes');

        $faker = Faker::create();

		$graphInput=['name'=> $faker->unique()->name,
        'description' => $faker->paragraph(1)];
        
		$graph=$this->graphRepository->create($graphInput);
		
		for($i=0;$i<$nbNodes;$i++){
		$this->nodeRepository->create(['graph_id'=>$graph->id]);

		}
				print "Graph generated successfully.";

		return 1;
    }
}
