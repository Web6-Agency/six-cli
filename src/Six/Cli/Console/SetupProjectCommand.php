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
        
        if($this->confirm('Mettre a jour les dependances composer du projet [Y/n] ?')) {
            $this->updateDependencies();
        }
        
        if($this->confirm('Installer tous les modules telecharges (six six:install) [Y/n] ?')) {
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
        $this->info("Execution de composer update");
        $this->system('composer update');
    }

	/**
     *
     */
    private function installModules()
    {
        $this->system('php artisan six:install -f');
    }
}
