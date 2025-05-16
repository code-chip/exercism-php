# Stack PHP
Stack docker for PHP projects

What is PHP?
A popular general-purpose scripting language that is especially suited to web development.
Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.

## Services
PHP 

## Requirements

- **Docker** 20.10.12+
- **Docker Compose** 1.25+
- **GIT** 2.25.1+

## How to Use
1- Download the shellscript run command `git clone git@github.com:code-chip/stack-php.git new_projec`  
2- Access the fold with `cd new_projec`  
3- Change the remote repository to the new one `git remote set-url origin git@github.com:your_user_github/new_project.git`.  
4- Add the source repository to get updates `git remote set-url stack git@github.com:code-chip/stack-php.git`. Check the change by running the command `git remote --v`  
```bash
Before:
origin git@github.com:code-chip/stack-php.git (fetch)
origin git@github.com:code-chip/stack-php.git (push)

After:
origin git@github.com:your_user_github/new_project.git (fetch)
origin git@github.com:your_user_github/new_project.git (push)
stack git@github.com:code-chip/stack-php.git (fetch)
stack git@github.com:code-chip/stack-php.git (push)
```
4- Fills the environment variable values int the .env file.  
5- Run the command `bin/dev build` or `docker-compose build`.  
6- Start services `bin/dev up` or `docker-compose up -d`.

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
