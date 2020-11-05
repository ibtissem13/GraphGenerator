<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\GraphRepositoryInterface;

class DisplayGraphStats extends Command
{
			private $graphRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
protected $signature = 'graph:stats {--gid=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command display graphs stats by graph id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GraphRepositoryInterface $graphRepository)
    {
        parent::__construct();
		$this->graphRepository=$graphRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$graphId  = $this->option('gid');
		
		$graph=$this->graphRepository->getInfos($graphId);
		if($graph!=null){
			print "Graph's stat : \n";
		echo $graph;
		print "\nnumber of nodes : ".$this->graphRepository->numberOfNodes($graphId)."\n";
		print "number of relations : ".$this->graphRepository->numberOfRelations($graphId)."\n";
		}else{
			print "Graph doesn't exist";
		}
        return 0;
    }
}
