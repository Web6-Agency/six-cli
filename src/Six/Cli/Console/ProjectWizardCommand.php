<?php namespace Six\Cli\Console;

class ProjectWizardCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'project:wizard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the project installer wizard';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // Create a new 6admin project based on private repo
        $this->call("project:create");
        
        // Configure projet (database etc ...)
        $this->call("project:configure");
        
        // Setup projet (Install modules, update composer, and module:install)
        $this->call("project:setup");
    }
}