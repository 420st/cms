# Content Management System for Laravel
This is a CMS backend for Laravel 4.x. Quickly integrate pages, blogs, FAQs, products, news, etc. in to your website and specify which areas you/client can manage.

## Inteded for
Developers creating websites for themselves or for clients.

## Installation

1. Add the package to your `composer.json` file
 ```bash
 composer require fourtwenty/cms:1.*
 ```

2. Add the service provider to `app/config/app.php`:
 ```php
 'FourTwenty\Cms\CmsControllerServiceProvider',
 ```

3. Run migration scripts to create related tables in the DB
 ```bash
 php artisan migrate --package=fourtwenty/cms
 ```

4. Publish asset files
 ```bash
 php artisan asset:publish --package=fourtwenty/cms
 ```

5. Run migrations
 ```bash
 php artisan db:seed --class="Fourtwenty\Cms\CmsDatabaseSeeder"
 php artisan db:seed --class="CmsDatabaseSeeder"
 ```

6. Custom configurations
 ```bash
  php artisan config:publish fourtwenty/cms