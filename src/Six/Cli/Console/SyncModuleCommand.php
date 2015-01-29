<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SyncModuleCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulling / Pushing modifications from / to module repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            
        ];
    }


}