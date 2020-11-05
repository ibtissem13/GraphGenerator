<?php

namespace App\Console\Commands;
use App\Repositories\GraphRepositoryInterface;

use Illuminate\Console\Command;

class ClearEmptyGraphs extends Command
{
		private $graphRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:clear
';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command deletes empty graphs';

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
		
       $operation=$this->graphRepository->clearEmptyGraphs();
		print "Empty graphs cleared successfully.";
		        return $operation;

    }
}
