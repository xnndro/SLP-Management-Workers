# SLP Management Workers

## Get Started
- First, use git kraken to clone this repository
- Second, open the project folder using your favorite code editor
- Third, open the terminal and run installation command in Installation section
- Fourth, run the project using the command in Usage section

## If u are done with the project
- First, open the terminal and run the linter first to check if there are any errors
```sh
./vendor/bin/pint
```
- Second, open the git kraken and commit the changes
- Third, push the changes to the repository
- Fourth, open the github and create a pull request
- Fifth, wait for the pull request to be approved

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
or u can do this
```sh
php artisan make:seeder SeederName --class=ClassName
```
- Publish the seeders
```sh
php artisan db:seed
```
or if u cannot using seeder, u can using Facade on migration files
```sh
use Illuminate\Support\Facades\DB;
```
and then u can use the Facade like this
```sh
DB::table('table_name')->insert([
    'column_name' => 'value',
    'column_name' => 'value',
    'column_name' => 'value',
]);
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

## Adding Asset
if u want to take the file from the public folder, u can use this
```sh
{{ asset('path/to/file') }}
```