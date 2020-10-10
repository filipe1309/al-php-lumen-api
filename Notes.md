composer create-project --prefer-dist laravel/lumen api-series

cd api-series

docker run --rm --name laravelcontainer  -itv %CD%:/var/www/html -w /var/www/html -p 8080:8080 php -S 0.0.0.0:8080 -t public

php artisan make:migration criar_tabela_series --create=series

php artisan make:migration criar_tabela_episodios --create=episodios

php artisan migrate

composer require firebase/php-jwt

## Endpoints

### Serie
#### Criar serie
POST http://localhost:8080/api/series
BODY RAW JSON
{
    "nome": "The Office"
}

#### Buscar serie
GET http://localhost:8080/api/series/3

#### Buscar series paginada
GET http://localhost:8080/api/series?page=1&per_page=3

#### Busca de Episodios por Serie
GET http://localhost:8080/api/series/1/episodios

#### Atualizar serie
PUT http://localhost:8080/api/series/3
BODY RAW JSON
{
    "nome": "Doctor Who!"
}

#### Remover serie
DELETE http://localhost:8080/api/series/6

### Episodio

#### Criar Episodio
POST http://localhost:8080/api/episodios
BODY RAW JSON
{
    "temporada": 1,
    "numero": 2,
    "assistido": false,
    "serie_id": 1
}

#### Buscar episodios
GET http://localhost:8080/api/episodios

#### Buscar episodio
GET http://localhost:8080/api/episodios/4

#### Atualizar Episodio
PUT http://localhost:8080/api/episodios/1
{
    "temporada": 1,
    "numero": 1,
    "assistido": true,
    "serie_id": 1
}