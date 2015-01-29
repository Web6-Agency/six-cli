<?php namespace Six\Cli\Console;

class CreateProjectCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'project:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new 6admin project based on private repo';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        if($this->confirm('Telecharger une fraiche installation de 6admin dans le dossier courant [Y/n] ?')) {
            
            $this->download();
            
            $this->info('OK !');
        }
    }
    
    private function download()
    {
        $this->system('git archive --format=tar --remote=git@git.dev.web-6.fr:6admin/6admin.git master | tar -xf -');
    }
}