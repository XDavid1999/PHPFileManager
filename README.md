<p align="center">
  <img align="center" width="200px" src="public/filemanager.png" align="center" alt="mm" />
</p>
	<h2 align="center">File Manager</h2>
	<p align="center">A File Manager built with Laravel </p>
<div>


<div align="center">
<img src="https://camo.githubusercontent.com/edd3031a0956c904634f9a394267a6ba61e9a0bb95c9512a1fbc0725b4014d03/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f2d4769742d626c61636b3f7374796c653d666c61742d737175617265266c6f676f3d676974" align="center" alt="git" />

<img src="https://camo.githubusercontent.com/8284c94af11d380053b5751b96d4c904cf33ea887881213d413e0f14920549dc/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f4f532d4c696e75782d696e666f726d6174696f6e616c3f7374796c653d666c61742d737175617265266c6f676f3d6c696e7578266c6f676f436f6c6f723d7768697465" align="center" alt="unix" />

<img src="https://camo.githubusercontent.com/85dc47a56a4e73ae7b6e64b3b4416785497e74219ae179ae8faaaca10d5a78d9/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f2d4769744875622d3138313731373f7374796c653d666c61742d737175617265266c6f676f3d676974687562" align="center" alt="git" />
</div>

---

## Requirements

File Manager requires a Docker, Docker Compose, Composer that contains the necessary libraries to initialize a Laravel project

* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Composer](https://getcomposer.org/)

## Usage
You just need to clone the repository with git
Use `composer install` in the root of the project to install the composer.json packages.

To install Composer dependencies for existing applications without wanting to install it on your computer person al you can use the following command
in the project root.

```yml
docker run --rm
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Once this is done copy the **.env.example** file and rename it to **.env** setting all the environment variables needed to create the container below.

Using the command `./vendor/bin/sail up`, sail will take care of building the necessary containers with the help of the **docker-compose.yml** file.

For create models if you don't have php installed, attach the php container to a bash shell and run the command
`php artisan migrate`.


Once all this is done access localhost.

---
