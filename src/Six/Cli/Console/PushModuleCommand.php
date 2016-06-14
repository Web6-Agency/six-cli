<?php namespace Six\Cli\Console;

class PushModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name, $signature = 'module:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pushing modifications to module repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modules = $this->getTargetModules();
        
        $this->pushModules($modules);
    }

	/**
     * @param $modules
     */
    public function pushModules($modules)
    {
        foreach($modules as $module) {
            $this->pushModule($module);
        }
    }

	/**
     * @param $module
     */
    public function pushModule($module)
    {
        $cwd = getcwd();
        chdir($cwd . '/6admin/' . $module);

        $this->info("Detection des modifications du module $module");
        $commit = exec('git rev-parse HEAD');

        $this->info("Dernier commit du module : $commit");

        $this->info("Execution du git push sur : composer $commit:master");
        $this->system('git push composer ' . $commit . ':master');

        $this->info("OK !");

        chdir($cwd);
    }
}