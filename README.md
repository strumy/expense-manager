# Expense Manager

This is the code base for ExpenseManager App.

ExpenseManager is a simple Laravel (v.12) application with Fortify package to keep record of user's daily expense and income using an embedded SQLite database.

## Features
+ User Login/Logout
+ User Signup
+ View Transaction List
+ Create Transaction
+ View Transaction
+ Update Transaction
+ Delete Transaction
+ Filter Transaction list by Search title text and transaction type.

## Installation
+ Pre-requisites:
    - PHP >= PHP 8
    - Composer
    - SQlite

+ Clone the repository, or download the zip file and extract it.

```
git clone https://github.com/strumy/expense-manager.git && cd expense-manager/
```
+ Copy the .env.example file to .env:
```cp .env.example .env```
+ Install the dependencies.
```composer install```
+ Generate the application key.
```php artisan key:generate```
+ Refresh the application cache.
```php artisan optimize```
+ Run the migrations and seed the database.
```php artisan migrate:fresh --seed```
+ Start the development server using below command or configure a virtual host.
```php artisan serve```
+ Open the application in a browser at http://127.0.0.1:8000.

## License

The TaskListApp software is using license under the [MIT license](https://opensource.org/licenses/MIT).
