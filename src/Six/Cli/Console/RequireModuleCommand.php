<?php namespace Six\Cli\Console;

class RequireModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name, $signature = 'module:require';

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
    public function handle()
    {
        $modules = $this->getTargetModules();
        
        return $this->downloadModules($modules);
    }

	/**
     * @param $modules
     *
     * @return int
     */
    public function downloadModules($modules)
    {
        foreach($modules as $module) {
            if($this->downloadModule($module) === 0) return 0;
        }
        
        return 1;
    }

	/**
     * @param $module
     *
     * @return int
     */
    public function downloadModule($module)
    {
        $this->info("Telechargement du module $module ... ");
        $this->system('composer require 6admin/' . $module);
        $this->info("Telechargement du module terminee");
    }
}