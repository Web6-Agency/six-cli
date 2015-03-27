<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

abstract class BaseModuleCommand extends BaseCommand {
    
    protected function getTargetModules()
    {
        if(is_null($this->argument('module'))) {
            $modules = [];

            foreach(glob("6admin/*") as $file) {
                $modules[] = str_replace('6admin/', '', $file);
            }
            
            return $modules;
        }
        else {
            return [$this->argument('module')];
        }
    }
    
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), [
            ['module', InputArgument::OPTIONAL, 'The module name', null]
        ]);
    }
}
