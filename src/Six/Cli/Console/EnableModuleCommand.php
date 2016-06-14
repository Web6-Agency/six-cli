<?php namespace Six\Cli\Console;

class EnableModuleCommand extends BaseModuleCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name, $signature = 'module:enable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable a disabled module';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->error('Command not available yet');
    }
}