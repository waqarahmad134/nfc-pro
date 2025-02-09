# Bank NFC

## How to install

0. ForPasses we need php 8.1 only


1. Install or update composer
```
    composer install
```

2. Run migrations
```
    php artisan migrate
```

3. Run database seeder for super admin credentionals, email and password will be displayed in the console
```
    php artisan db:seed
``` 

4. Generate passport keys for the project
```
    php artisan passport:install
```
5. Create new project keys
```
    php artisan key:generate
```
6. Create Storage Link
```
    php artisan storage:link
```

or
```
rm public/storage     || rm -rf public/storage

php artisan storage:link
```


To chk which functions is not enable in php.ini file 
```
php -i | grep disable_functions

https://support.hostinger.com/en/articles/1583694-is-symlink-function-enabled

To make the symlink function work, please remove it from the list. You can check from PHP Configuration > PHP option > disableFunctions > Remove Symlink.
```


Verify the Certificate File Path

```
ls -l storage/app/certificates/certificates.p12
```

Check its permissions:
```
chmod 644 storage/app/certificates/certificates.p12
```

If facing this issue 
cURL error 6: Could not resolve host laravel
then 
```
composer dump-autoload
```

## API Documentation
https://documenter.getpostman.com/view/16911064/2s93sZ5tfG#e3a68a5b-8492-4683-bcaf-5166f38eae80


