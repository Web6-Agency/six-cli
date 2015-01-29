<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ConfigureProjectCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'project:configure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure projet (database etc ...)';

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