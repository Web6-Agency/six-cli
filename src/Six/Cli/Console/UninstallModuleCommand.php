<?php namespace Six\Cli\Console;

class UninstallModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall module by running uninstallation script and then delete the module folder';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->uninstallModules($modules);
    }

	/**
     * @param $modules
     */
    public function uninstallModules($modules)
    {
        foreach($modules as $module) {
            $this->uninstallModule($module);
        }
    }

	/**
     * @param $module
     */
    public function uninstallModule($module)
    {
        $cwd = getcwd();
        
        $this->info("Execution du script de desinstallation du module $module");
        $this->system('php artisan six:uninstall -f ' . $module);

        $this->info("Suppression du package $module");
        $this->system('composer remove 6admin/' . $module);
    }
}