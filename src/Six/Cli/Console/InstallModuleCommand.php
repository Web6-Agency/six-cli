<?php namespace Six\Cli\Console;

class InstallModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download a module if not downloaded and run installation (with example seeds or not)';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->installModules($modules);
    }
    
    public function installModules($modules)
    {
        foreach($modules as $module) {
            $this->installModule($module);
        }
    }
    
    public function installModule($module)
    {
        $this->call('module:download', ['module' => $module]);
        
        $this->info("Execution du script d'installation du module $module.");
        $this->system('php artisan six:install -f ' . $module);
    }
}