<?php namespace Six\Cli\Console;

class SetupProjectCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup projet (Install modules, update composer, and module:install)';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        if($this->confirm('Initialiser un depot git et envoyer un commit initial [Y/n] ?')) {
            $this->initGit();
        }

        /*
        if($this->confirm('Telecharger tous les modules de 6admin disponibles (six module:download) [Y/n] ?')) {
            $this->downloadModules();
        }
        */
        
        if($this->confirm('Mettre a jour les dependances composer du projet [Y/n] ?')) {
            $this->updateDependencies();
        }
        
        if($this->confirm('Installer tous les modules telecharges (six module:install) [Y/n] ?')) {
            $this->installModules();
        }
    }

	/**
     *
     */
    private function initGit()
    {
        $this->system('git init');
        $this->system('git add .');
        $this->system("git commit -m \"base project\"");
    }

	/**
     *
     */
    private function updateDependencies()
    {
        $cwd = getcwd();
        
        $this->info("Execution de composer update pour creolab/laravel-modules");
        chdir(realpath($cwd . '/workbench/creolab/laravel-modules'));
        $this->system('composer update');

        $this->info("Execution de composer update");
        chdir($cwd);
        $this->system('composer update');
    }

	/**
     *
     */
    private function installModules()
    {
        $this->call('module:install');
    }
}