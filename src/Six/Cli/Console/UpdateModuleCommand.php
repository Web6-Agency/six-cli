<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UpdateModuleCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a module by deleting the module folder, downloading new version and running installation script';

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