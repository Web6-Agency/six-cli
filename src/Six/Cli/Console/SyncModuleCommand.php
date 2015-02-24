<?php namespace Six\Cli\Console;

class SyncModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulling / Pushing modifications from / to module repository';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->syncModules($modules);
    }

	/**
     * @param $modules
     */
    public function syncModules($modules)
    {
        foreach($modules as $module) {
            $this->syncModule($module);
        }
    }

	/**
     * @param $module
     */
    public function syncModule($module)
    {
        $this->call('module:pull', ['module' => $module]);
        $this->call('module:push', ['module' => $module]);
    }
}