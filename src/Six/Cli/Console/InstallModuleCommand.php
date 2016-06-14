<?php namespace Six\Cli\Console;

class InstallModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name, $signature = 'module:install';

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
    public function handle()
    {
        $modules = $this->getTargetModules();
        
        $this->installModules($modules);
    }

	/**
     * @param $modules
     */
    public function installModules($modules)
    {
        foreach($modules as $module) {
            $this->installModule($module);
        }
    }

	/**
     * @param $module
     */
    public function installModule($module)
    {
        $cwd = getcwd();

        if(!file_exists($cwd . '/6admin/' . $module)) {
            $this->call('module:require', ['module' => $module]);
        }

        $this->info("Execution du script d'installation du module $module");
        $this->system('php artisan six:install -f ' . $module);

        $this->info("Installation du module terminee");
    }
}