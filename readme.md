# tanam-pohon
 Tanam pohon merupakan sebuah projek akhir matakuliah pengembangan perangkat lunak agroindustri

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Download with github desktop / clone it with git bash / cmd

    git clone git@github.com:verdy25/tanam-pohon.git

Switch to the repo folder

    cd tanam-pohon

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Open .env file
    
    ubah isi DB_DATABASE menjadi db_tapo
    
Run the database migrations

    php artisan migrate

You can use seed

    php artisan db:seed
    
    php artisan laravolt:indonesia:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
