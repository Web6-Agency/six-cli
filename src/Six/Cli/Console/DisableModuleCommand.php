<?php namespace Six\Cli\Console;

class DisableModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:disable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Temporary disable a module';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->error('Command not available yet');
    }
}