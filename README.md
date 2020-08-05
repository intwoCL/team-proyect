# Team project

Laravel Framework 7.0
VERSION PROJECT 0.1

#### Repositorio
```shell
git clone zxx team
cd team
code .
composer install
```

Copy .env
```shell
cp .env.example .env
```

Initial
```shell
  php artisan migrate:refresh
  php artisan db:seed
  composer dump-autoload
```


#### Translate
add to lang -> t.php
```shell
trans('t.message.success.create')
```