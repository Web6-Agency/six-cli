Six CLI
===========

This package is part of 6admin package.

### Installation

```shell
composer global require "web6-agency/six-cli:dev-master"
```

### Setup

After installation completed, you can access the `six` cli from `bin` folder.

```
~/composer/vendor/bin/six
```

You may create alias for quick access the `six` cli, or export the bin path to your `~/.bashrc` file.

```shell
alias six="vendor/bin/six"

export PATH="vendor/bin:$PATH"
```

### Usage

There is some command you can use for controling 6admin installation.
You may also show all available command using `six` command without params.

```shell
$ six
```

Commands for creating / configuring a project

```shell
	# Start the project installer wizard
	six project:wizard
		
		# Create a new 6admin project based on private repo
		six project:create
		
		# Configure projet (database etc ...)
		six project:configure
		
		# Setup projet (Install modules, update composer, and module:install)
		six project:setup	
```

Commands for managing cms modules :

```shell
	# List all available six modules
	six module
	
	# Download a module if not downloaded and run installation (with example seeds or not)
	six module:install [module_name] [--example-seeds]
	
	# Only download a module without installing it
	six module:download [module_name]
	
	# Uninstall module by running uninstallation script and then delete the module folder
	six module:uninstall [module_name]
	
	# Refresh a module by running uninstall / reinstall each modules
	six module:refresh [module_name]
	
	# Update a module by deleting the module folder, downloading new version and running installation script
	six module:update [module_name]
	
	# Temporary disable a module
	six module:disable
	
	# Enable a disabled module
	six module:enable
	
	# Pulling modifications from module repository
	six module:sync [module_name]
	
	# Pulling modifications from module repository
	six module:pull [module_name]
	
	# Pushing modifications to module repository
	six module:push [module_name]
```