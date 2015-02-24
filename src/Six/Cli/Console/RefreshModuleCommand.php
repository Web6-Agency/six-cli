<?php namespace Six\Cli\Console;

class RefreshModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh a module by running uninstall / reinstall each modules';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->refreshModules($modules);
    }

	/**
     * @param $modules
     */
    public function refreshModules($modules)
    {
        foreach($modules as $module) {
            $this->refreshModule($module);
        }
    }

	/**
     * @param $module
     */
    public function refreshModule($module)
    {
        $this->info("Execution du script de desinstallation du module $module.");
        $this->system('php artisan six:uninstall -f ' . $module);
        
        $this->info("Execution du script d'installation du module $module.");
        $this->system('php artisan six:install -f ' . $module);
    }
}