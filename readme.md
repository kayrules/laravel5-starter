## Laravel 5 Starter CMS Template

##Installation

###1. Install via composer
---
You can use composer create-project to install without downloading zip or cloning this repo.
```
$ composer create-project kayrules/laravel5-starter your-project-name
```

###2. Manual Install
---
Alternatively, you can manually install by cloning this repo or download the zip file from this repo, and run composer install.
```
$ git clone https://github.com/kayrules/laravel5-starter.git .
$ composer install
```

##Configuration

###1. Setup Permission
---
After composer finished install the dependencies, it should automatically change the storage and cache folders permission to 777. Just incase if it's not did as expected, you need to manually change it recursively as command below.
```
$ chmod -R 777 app/storage/
$ chmod -R 777 bootstrap/cache/
```

###2. Database Config
---
Before run the migration command, you need to create a new database for this project and update the login information under `app/config/database.php`

###3. Initial Migration
---
```
$ php artisan migrate
$ php artisan db:seed
```

##Demo

###* URL
---
For public access:
```
http://dev.kayrules.com/laravel5-starter/
```

Administrator Access:
```
http://dev.kayrules.com/laravel5-starter/admin
- Username: admin@domain.com
- Password: 1q2w3e4r
```








