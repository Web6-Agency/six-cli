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
        }
    }

	/**
     *
     */
    private function download()
    {
        $this->info('Recherche de la derniere version disponible ...');
        $tag = $this->getLastTag();

        $this->info('Recuperation et decompression de la version ' . $tag);
        $this->system('git archive --format=tar --remote=git@git.dev.web-6.fr:6admin/6admin.git ' . $tag . ' | tar -xf -');

        $this->info('Telechargement termine !');
    }

    private function getLastTag()
    {
        $reference = exec('git ls-remote git@git.dev.web-6.fr:6admin/6admin.git');
        list(,$tag) = explode('refs/tags/', $reference);
        return $tag;
    }
}