<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class DownloadModuleCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Only download a module without installing it';

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