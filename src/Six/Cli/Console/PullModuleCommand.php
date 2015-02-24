<?php namespace Six\Cli\Console;

class PullModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulling modifications from module repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->pullModules($modules);
    }

	/**
     * @param $modules
     */
    public function pullModules($modules)
    {
        foreach($modules as $module) {
            $this->pullModule($module);
        }
    }

	/**
     * @param $module
     */
    public function pullModule($module)
    {
        $this->info("Recuperation des commit du subtree $module");
        $this->system('git subtree pull --prefix=6admin/' . $module . ' --squash ' . $module . ' master');
    }
}
