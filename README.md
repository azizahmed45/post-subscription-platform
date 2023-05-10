Setup Procedure

    Clone the repository

    Install the dependencies
    composer install

    Create a copy of your .env file
    cp .env.example .env

    Generate an app encryption key
    php artisan key:generate

    Create an empty database for our application
    
    In the .env file, add database information to allow Laravel to connect to the database

    DB_DATABASE="post-subscription-platform"
    DB_USERNAME=root
    DB_PASSWORD=


Also Mail server details

    MAIL_MAILER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=

use queue driver as database

    QUEUE_CONNECTION=database

Run the following commands

    php artisan migrate
    php artisan db:seed
    php artisan serve

    Run the queue worker
    php artisan queue:work


For send emails that is not sent use the following command

    php artisan app:send-post-emails

For documentation use the following command

    php artisan scribe:generate

To view the documentation

    http://url.test/docs
For OpenApi documentation

    http://url.test/docs/openapi.yaml

For Postman Collection

    http://url.test/docs/collection.json

