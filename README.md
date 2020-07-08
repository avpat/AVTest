TEST

<a id="about-you"></a>
## About me

* **First name:** `Abhijeet`
* **Last name:** `Patil`


<a id="your-comments"></a>

* Backend `Laravel` Framework : `api` folder
* Front-end Framework : `VueJS` 


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

**Time:*
 
* I spend 1.25 hours yesterday and then stopped as I reached defined time limit. 
* After discussion with Sam, today, I continued working on remaining part. and spend around 1.5 hours


**Written Questions:**

1. Summarise your approach, explaining any decisions and assumptions taken.
- defined the file storage, database connections
- followed by a basic laravel based controller to upload the files with database table to store the files
- ASSUMPTION: the mimetypes are taken from the geomiq website
- I encountered issue with the file size. Fixed with nginx filesize.
- The created a component with VueJs framework and add components
- reorganised VueJs files and moved them to resources folder.
- tested with some examples

2. How could you improve the UX of your form?
- create a dropzone to add the files
- validation whilst dropping the file(mimetypes)
- validation to check of the file is repeated
- allowing user to add multiple files
- I would use bootstrap or bulma
3. If given another 24 hours on this – What would you do?
- style the form and thumbnail section
- add unit tests
- show success or error messages on the screen
 

