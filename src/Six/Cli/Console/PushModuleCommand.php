<?php namespace Six\Cli\Console;

class PushModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:push';

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
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        $this->pushModules($modules);
    }
    
    public function pushModules($modules)
    {
        foreach($modules as $module) {
            $this->pushModule($module);
        }
    }
    
    public function pushModule($module)
    {
        $this->info("Envoie des commit au subtree $module");
        $this->system('git subtree push --prefix=6admin/' . $module . ' ' . $module . ' master');
    }
}