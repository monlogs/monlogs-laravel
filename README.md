# Monlogs for Laravel

## Requirements
- PHP >= 7.2
- Laravel >= 5.8

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

5. Add following string to app/Exceptions/Handler.php to render section before return
```
\Monlogs::sendError($exception);
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

5. Добавьте следующую строчку в файл app/Exceptions/Handler.php в функцию render перед return
```
\Monlogs::sendError($exception);
```


## LICENSE
GNU GPLv3  
Copyright Alexanyasha