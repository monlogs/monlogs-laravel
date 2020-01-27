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

1. �������� ���� config/app.php � �������� ������� � ������ providers
```
DesignCoda\Monlogs\MonlogsServiceProvider::class,
```

2. � ������ aliases ���� �� ����� config/app.php �������� �����
```
'Monlogs' => DesignCoda\Monlogs\MonlogsFacade::class,
```

3. �������� API-���� ��� ������ �����

4. ��������� ���� .env (������� ���� API-����)

        MONLOGS_API_KEY=

5. �������� ��������� ������� � ���� app/Exceptions/Handler.php � ������� render ����� return
```
\Monlogs::sendError($exception);
```



## LICENSE
GNU GPLv3  
Copyright Alexanyasha