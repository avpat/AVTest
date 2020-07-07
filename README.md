<p align="center">
    <img alt="Pod Point" height="150" src="./support/logo.png" title="Pod Point" width="498" />
</p>

<a id="about-you"></a>
## About me

* **First name:** `Abhijeet`
* **Last name:** `Patil`


<a id="your-comments"></a>
***

* The provided docker environment was not compatible so I've changed it to the docker-compose.yml
* I've prepared a docker equivalent emvironment with `docker-compose` file.  Which can be installed by following command 
`docker-compose build & docker-compose up -d`
* If needed, I've added installation instruction in the section [Docker Installation Notes](#the-installation)
* I've tested the code on the swagger-ui. I've implemented api's with Postman. The postman collection can be imported from the link. [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/ebec28b9a285ec35d95e)


* Backend `Laravel` Framework : `api` folder
* Front-end Framework : `VueJS` : `front\code\public` -> please execute `yarn serve` so the frontend will be available at port 8080
* Css Framework: bulma https://bulma.io/ 
* The test was fun to work on. Thanks for the opportunity 

<p align="center">
    <strong>IMPORTANT: Publishing your test on a public repository would render an automatic disqualification</strong>
</p>


















<a id="the-installation"></a>
##Docker-compose Installation Notes

- Run a docker desktop on your machine
- Goto your root folder
- Run a docker build command and it should copy all the required images
`` docker-compose build && docker-compose up -d``
- Check if the docker container is running with following command
``docker-compose ps``
- If any issue occurs execute ``docker-compose down -v `` and then once again execute `` docker-compose build && docker-compose up -d``
- if any issue occurs check folder perssions from the docker desktop
- if everything ok then execute ``docker-compose exec php php artisan config:cache``


##Migrate and seed database
- The factory and migration files are provided along with this repo
- to run the migrations, run 
* ``docker-compose exec php php artisan migrate``
- Then seed
* ``    docker-compose exec php php artisan db:seed``

If you face any issue with migrate and seeding then follow these steps
- Rollback 
* ``docker-compose exec php php artisan migrate:rollback``
* ``composer dump-autoload``
* ``docker-compose exec php php artisan migrate:refresh --seed``

***
