# PositiveTourism Backend


## Prerequisite

- Composer

- Install Docker

https://docs.docker.com/install/

- Then run:

```
sudo service docker start
sudo service docker status
```

- Install docker-compose

https://docs.docker.com/compose/install/


## Intallation

```
cd <directory where to download the repository>
git clone https://github.com/LauraDev/PositiveTourism_api.git

docker-compose pull # Download the latest versions of the pre-built images
docker-compose up -d # Running in detached mode

cd api
composer install
cd ..

```

## MySQL Database

( To switch from postgres to MySQL I used that link: https://github.com/Selion05/docs/blob/2.2/core/mysql.md

+++++

<span style="color:blue;"> /api/.env -> DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db ) </span>

To sync the db

```
docker-compose exec php bin/console doctrine:schema:update --force --complete
```
