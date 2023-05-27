When you are cloning a Laravel project from GitHub, you have to :

Run composer install on your cmd or terminal
Copy .env.example file to .env on the root folder
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration
Run php artisan key:generate
Run php artisan migrate
Run php artisan serve
Go to http://localhost:8000/
and also run

php artisan optimize