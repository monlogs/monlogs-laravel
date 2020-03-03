# Monlogs for Laravel

## Requirements
- PHP >= 7.2
- Laravel >= 5.8
 
## Description
This plugin send errors of your Laravel project to your another site via REST API. Send following info:
```
'message' - error message (syntax error, unexpected '}', expecting ';'), 
'file' - file (absolute path), 
'line' - line where error occured, 
'trace' - string with trace of an error, 
'user_id' - id of authored user (or null), 
'url' - URL, 
'site' - site domain, 
'api_key' - your api key.
```


## Installation

### Composer
```
composer require designcoda/monlogs-laravel
```

### Laravel

1. Open config/app.php file and add provider 
```
DesignCoda\Monlogs\MonlogsServiceProvider::class,
```

2. In aliases section of config/app.php add a Facade
```
'Monlogs' => DesignCoda\Monlogs\MonlogsFacade::class,
```

3. Get API key for your site

4. Configure .env as needed

        MONLOGS_API_KEY=
        MONLOGS_API_URL=

5. Run for clear caching
```
php artisan optimize
```


### Laravel

1. Откройте файл config/app.php и добавьте строчку в секции providers
```
DesignCoda\Monlogs\MonlogsServiceProvider::class,
```

2. В секции aliases того же файла config/app.php добавьте фасад
```
'Monlogs' => DesignCoda\Monlogs\MonlogsFacade::class,
```

3. Получите API-ключ для вашего сайта

4. Настройте файл .env (введите свой API-ключ)

        MONLOGS_API_KEY=
        MONLOGS_API_URL=

5. Очистите кэш командой
```
php artisan optimize
```

## LICENSE
GNU GPLv3  
Copyright Alexanyasha