<?php namespace Six\Cli;

use Illuminate\Container\Container;

class Application extends \Symfony\Component\Console\Application {

    /**
     * The version of this app.
     *
     * @var string
     */
    const VERSION = '1.0-dev';

    /**
     * The name of this app.
     *
     * @var string
     */
    const NAME = 'Six Cli';

    /**
     * @var array
     */
    protected $consoles = [
        'ProjectWizard',
        'CreateProject',
        'ConfigureProject',
        'SetupProject',
        
        'Module',
        'InstallModule',
        'DownloadModule',
        'UninstallModule',
        'RefreshModule',
        'DisableModule',
        'EnableModule',
        'SyncModule',
        'PullModule',
        'PushModule',
    ];

    /**
     * The constructor.
     */
    public function __construct()
    {
        parent::__construct(self::NAME, self::VERSION);
    }

    /**
     * @param Container $container
     */
    public function registerCommands(Container $container)
    {
        foreach ($this->consoles as $console)
        {
            $this->add($container->make($this->getConsoleClassName($console)));
        }
    }

    /**
     * @param $console
     * @return string
     */
    private function getConsoleClassName($console)
    {
        return __NAMESPACE__ . '\\Console\\' . $console . 'Command';
    }

}