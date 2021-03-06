<?php namespace Six\Cli\Console;

class ModuleCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name, $signature = 'module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all available six modules';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->system('php artisan modules');
    }
}