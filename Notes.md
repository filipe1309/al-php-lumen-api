composer create-project --prefer-dist laravel/lumen api-series

cd api-series

docker run --rm --name laravelcontainer  -itv %CD%:/var/www/html -w /var/www/html -p 8080:8080 php -S 0.0.0.0:8080 -t public

php artisan make:migration criar_tabela_series --create=series

php artisan make:migration criar_tabela_episodios --create=episodios

php artisan migrate