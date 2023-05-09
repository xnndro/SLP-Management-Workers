# SLP Management Workers

## Installation
Install the laravel framework and the composer dependencies

```sh
composer install
cp .env.example .env
```
open .env file and edit the database name, username and password

```sh
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

Install the node dependencies

```sh
npm install
npm run build
```

## Usage
```sh
php artisan serve
```

## Processing Steps
- Creating migration files for the database tables
```sh
php artisan make:migration create_table_name_table --create=table_name
```
- Creating models for the database tables
```sh
php artisan make:model ModelName
```
- Creating Controllers for the database tables -> CRUD Operations
```sh
php artisan make:controller ControllerName
```

- Creating routes for the database tables
```sh
Route::resource('route_name', 'ControllerName');
```
or u can do this (prever this way, because it's more clear and u can give a name to the route)
```sh
Route::get('route_name', 'ControllerName@index')->name('route_name.index');
Route::get('route_name/create', 'ControllerName@create')->name('route_name.create');
Route::post('route_name', 'ControllerName@store')->name('route_name.store');
Route::get('route_name/{id}', 'ControllerName@show')->name('route_name.show');
Route::get('route_name/{id}/edit', 'ControllerName@edit')->name('route_name.edit');
Route::put('route_name/{id}', 'ControllerName@update')->name('route_name.update');
Route::delete('route_name/{id}', 'ControllerName@destroy')->name('route_name.destroy');
```

- Creating views for the database tables
- Creating seeders for the database tables
```sh
php artisan make:seeder SeederName
```

## Shortcuts
- Creating migration, and models together
```sh
php artisan make:model ModelName -m
```
so u don't need to create the migration file and the model file separately, and the name of migration file will be the same as the name of the model file using format "create_table_name_table"

- Creating migration, models, and controllers together
```sh
php artisan make:controller ControllerName -r -m ModelName
```
so u don't need to create the migration file, the model file, and the controller file separately, and the name of migration file will be the same as the name of the model file using format "create_table_name_table"
