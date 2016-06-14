<?php namespace Six\Cli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

abstract class BaseCommand extends Command {
    
    public function confirm($question, $default = true)
    {
        if($this->option('yes'))
            return true;
        
        return parent::confirm($question, $default);
    }
    
    /**
     * Execute raw system command with real time output
     */
    public function system($command)
    {
        if( ($fp = popen($command, "r")) ) {
            while( !feof($fp) ){
                echo fread($fp, 1024);
                flush(); // you have to flush buffer
            }
            fclose($fp);
        }
    }

	/**
     * Backward compat for 4.* versions
     */
    public function fire()
    {
        $this->handle();
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
            ['yes', 'y', InputOption::VALUE_OPTIONAL, 'Accept all questions', false]
        ];
    }
}