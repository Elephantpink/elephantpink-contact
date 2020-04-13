# elephantpink-contact
 
## Install package

`` 
 composer require elephantpink/contact 
``

## Database: migrations and seeders

``
 php artisan vendor:publish --tag=epink-contact-migrations
``

After this, you'll find the migrations under the main database/migrations folder.

To run them, simply execute:

`` 
 php artisan migrate
``

If you want sample data on the database, simply execute:

``
 php artisan db:seed --class=ContactSeeder
``

## Frontend

You can use directly the components from the vendor folder, or if you need to customize them, simply publish them to the resource folder:

`` 
 php artisan vendor:publish --tag=epink-contact-assets 
``

This will create two separate "contact" folders under resources/js and resources/sass.

In order to use these components you'll need to install the following node packages:

To do so, simply run:

``
 npm install vuex ...
``
