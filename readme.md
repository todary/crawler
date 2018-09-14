# Project Title
crawler in PHP

## TASK
 Create a crawler in PHP that saves all the links of the following page and his subpages (around 50x subpages) in a MySQL database
-> Link: https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste


 
## Requirements 

 Create a crawler in PHP that saves all the links of the following page and his subpages (around 50x subpages) in a MySQL database
-> Link: https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste



## Installation
Using Composer :

```
composer install
```

If you don't have composer, you can get it from [Composer](https://getcomposer.org/)



My database 
```
 public/sql
```


## How to  Run the application
1- upload database 
2- change database connection form .env
3- please run " php artisan queue:listen "  as commend line
to start job to crawler lnkes 


use rout 
```
http://localhost/internsvalley/public/crawler
```



