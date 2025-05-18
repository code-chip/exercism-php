# Explore the PHP exercises on Exercism
Stack docker for PHP projects

Unlock more exercises as you progress. They’re great practice and fun to do!

## Services
PHP 

## Requirements

- **Docker** 20.10.12+
- **Docker Compose** 1.25+
- **GIT** 2.25.1+

## How Working Locally With Exercism
Learn how to solve exercises on your local machine  
Solving exercises on your local machine allows you to do all the coding in an environment you're familiar with.  
access link for more information: https://exercism.org/docs/using/solving-exercises/working-locally  

## How to Use
1- Download the shellscript run command `git clone git@github.com:code-chip/exercism-php.git`  
2- Access the fold with `cd exercism-php`  
3- Maintain the stack repository to receive updates `git remote add origin git@github.com:code-chip/stack-php.git`. Verify the change by running the `git remote --v` command.  
```bash
Before:
origin git@github.com:code-chip/exercism-php.git (fetch)
origin git@github.com:code-chip/exercism-php.git (push)

After:
origin git@github.com:your_user_github/exercism-php.git (fetch)
origin git@github.com:your_user_github/exercism-php.git (push)
stack git@github.com:code-chip/stack-php.git (fetch)
stack git@github.com:code-chip/stack-php.git (push)
```
4- Fills the environment variable values int the .env file.  
5- Run the command `bin/dev build` or `docker-compose build`.  
6- Start services `bin/dev up` or `docker-compose up -d`.
7- Installation PHPunit, enter in container with `bin/dev console` and run command `composer require --dev phpunit/phpunit`.   

## Available development commands
* `bin/dev build` will force (re)building the docker-compose stack.
* `bin/dev rebuild` will update the base docker images, build the docker-compose stack, stop the running containers and restart with the freshly built images.
* `bin/dev up` or `bin/dev start` will start the docker-compose stack.
* `bin/dev status` will print the current status of the docker-compose stack.
* `bin/dev restart` will restart the docker-compose stack.
* `bin/dev logs <service>` will print the logs for the given container.
* `bin/dev console <service>` will start a bash console inside the `web(wordpress), db(mysql) or phpmyadmin` container.
* `bin/dev stop <service>` will stop all running docker-compose stack containers.
* `bin/dev down <service>` will stop and remove all docker-compose stack containers.
* `bin/dev exec --args` will start a bash console inside the `web(wordpress), db(mysql) or phpmyadmin` container.

## Access broswer
PHP [http:localhost](http:localhost)

## How use test with PHPunit
vendor/bin/phpunit fold_name/test_name.php