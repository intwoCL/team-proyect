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

### Inicial con forma de seed
```shell
php artisan storage:link

composer dump-autoload
php artisan migrate:fresh --seed
```

### Inicial laravel-mix mode dev
```shell
npm install
npm run dev
```


<!-- #### Inicial laravel-mix mode produccion
```shell
npm install
npm run prod
``` -->

<!-- Initial
```shell
php artisan migrate:refresh
composer dump-autoload
php artisan db:seed
``` -->


<!-- 

#### Translate
add to lang -> t.php
```shell
trans('t.message.success.create')
``` -->

<!-- Tamaños https://laravel.com/docs/4.2/schema -->
<!-- https://stackoverflow.com/questions/2023481/mysql-large-varchar-vs-text -->