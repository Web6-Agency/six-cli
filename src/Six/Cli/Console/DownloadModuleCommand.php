<?php namespace Six\Cli\Console;

class DownloadModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:download';

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
    public function fire()
    {
        $modules = $this->getTargetModules();
        
        return $this->downloadModules($modules);
    }
    
    public function downloadModules($modules)
    {
        foreach($modules as $module) {
            if($this->downloadModule($module) === 0) return 0;
        }
        
        return 1;
    }
    
    public function downloadModule($module)
    {
        $cwd = getcwd();
        
        if(file_exists(realpath($cwd . '/6admin/' . $module))) {
            $this->error("Le module $module est deja telecharge, abandon du telechargement.");
            return 0;
        }
        
        $this->info("Telechargement du module $module ... ");

        $this->system('git remote add ' . $module . ' git@git.dev.web-6.fr:6admin/' . $module . '.git');
        $test = $this->system('git subtree add --squash --prefix=6admin/' . $module . ' ' . $module . ' master');
        
        if(file_exists(realpath($cwd . '/6admin/' . $module))) {
            $this->info('Telechargement : OK !');
        }
        else {
            $this->error("Impossible de telecharger le module $module ! (modification non commit dans git ?)");
            return 0;
        }
    }
}