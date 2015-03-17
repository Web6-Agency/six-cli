<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

abstract class BaseModuleCommand extends BaseCommand {
    
    protected function getTargetModules()
    {
        if(is_null($this->argument('module'))) {
            return [
                'core',
                'model',
                'asset',
                'account',
                'catalog',
                'backoffice',
                'editable',
                'editorial',
                'form',
                'frontoffice',
                'media',
                'remote',
                'temoignage'
            ];
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
