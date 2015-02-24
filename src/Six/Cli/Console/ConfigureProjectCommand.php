<?php namespace Six\Cli\Console;

class ConfigureProjectCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'project:configure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure projet (database etc ...)';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        if($this->confirm('Configurer les acces MySQL du projet [Y/n] ?')) {
            $this->configureMySQL();
        }
    }

	/**
     * @return bool
     */
    private function configureMySQL()
    {
        $databaseFile = realpath(getcwd() . '/app/config/database.php');
        
        if(!file_exists($databaseFile)) {
            $this->error("Impossible de trouver le fichier de configuration mysql : " . $databaseFile);
            return false;
        }
        
        $mysqlOk = false;
        
        while($mysqlOk !== true) {
            
            $host = $this->ask('[MySQL] Hote de la base de donnees [localhost] :', 'localhost');
            $database = $this->ask('[MySQL] Nom de la base de donnees [my_project] :', 'my_project');
            $user = $this->ask('[MySQL] Utilisateur de la base de donnees [root] :', 'root');
            $password = $this->secret('[MySQL] Mot de passe pour l\'utilisateur ' . $user . ' [secret] :', 'secret');

            $this->info("Test de la connexion en cours ...");
            
            $mysqlStatus = $this->isMysqlConnectionValid($host, $database, $user, $password);
            
            if($mysqlStatus !== true) {
                $this->error("Impossible de se connecter a MySQL : " . $mysqlStatus);
                if($this->ask('Saisir de nouvelles informations de connexion [Y/n] ?', 'y') !== "y") {
                    break;
                }
            }
            else {
                $mysqlOk = true;
                $this->info("Connexion OK !");
            }
        }

        if($mysqlOk === true and $this->ask('Appliquer les modifications au fichier ' . $databaseFile . ' [Y/n] ?', 'y') == "y") {
            $this->updateConfigFile($databaseFile, 'MYSQL_HOST_LINE', $host);
            $this->updateConfigFile($databaseFile, 'MYSQL_DATABASE_LINE', $database);
            $this->updateConfigFile($databaseFile, 'MYSQL_USER_LINE', $user);
            $this->updateConfigFile($databaseFile, 'MYSQL_PASSWORD_LINE', $password);
            
            $this->info("Ecriture de la configuration OK !");
        }
    }

	/**
     * @param $host
     * @param $database
     * @param $user
     * @param $password
     *
     * @return bool|string
     */
    private function isMysqlConnectionValid($host, $database, $user, $password) {
        // Create connection
        $connection = @mysqli_connect($host, $user, $password, $database);

        // Check connection
        if (mysqli_connect_errno())
            return "Failed to connect to MySQL: " . mysqli_connect_error();
        else
            return true;
    }

	/**
     * @param $file
     * @param $tag
     * @param $value
     */
    private function updateConfigFile($file, $tag, $value) {
        $data = file($file);

        $data = array_map(function($data) use ($tag, $value) {
            if (strpos($data, '[' . $tag . ']') !== false) {
                $temp = explode('=>', $data);
                $data = $temp[0] . '=> ' . "'$value', // [$tag]\n";
            }
            return $data;
        }, $data);

        file_put_contents($file, implode('', $data));
    }
}