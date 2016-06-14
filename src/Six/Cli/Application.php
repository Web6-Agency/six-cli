<?php namespace Six\Cli;

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
        'RequireModule',
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
    public function registerCommands()
    {
        foreach ($this->consoles as $console)
        {
            $name = $this->getConsoleClassName($console);
            
            $this->add(new $name());
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
