composer create-project --prefer-dist laravel/lumen api-series

cd api-series

docker run --rm --name laravelcontainer  -itv %CD%:/var/www/html -w /var/www/html -p 8080:8080 php -S 0.0.0.0:8080 -t public

php artisan make:migration criar_tabela_series --create=series

php artisan make:migration criar_tabela_episodios --create=episodios

php artisan migrate

composer require firebase/php-jwt

php artisan make:migration criar_tabela_usuarios --create=usuarios

php artisan migrate

php artisan make:seeder UsuarioSeeder

php artisan db:seed

## Endpoints

### Login (Token JWT)
POST http://localhost:8080/api/login
BODY RAW JSON
{
    "email": "teste@teste.com",
    "password": "senha"
}

### Serie
#### Criar serie
POST http://localhost:8080/api/series
HEADER Authorization: Bearer TOKEN
BODY RAW JSON
{
    "nome": "The Office"
}

#### Buscar serie
GET http://localhost:8080/api/series/3
HEADER Authorization: Bearer TOKEN

#### Buscar series paginada
GET http://localhost:8080/api/series?page=1&per_page=3
HEADER Authorization: Bearer TOKEN

#### Busca de Episodios por Serie
GET http://localhost:8080/api/series/1/episodios
HEADER Authorization: Bearer TOKEN

#### Atualizar serie
PUT http://localhost:8080/api/series/3
HEADER Authorization: Bearer TOKEN
BODY RAW JSON
{
    "nome": "Doctor Who!"
}

#### Remover serie
DELETE http://localhost:8080/api/series/6
HEADER Authorization: Bearer TOKEN

### Episodio

#### Criar Episodio
POST http://localhost:8080/api/episodios
HEADER Authorization: Bearer TOKEN
BODY RAW JSON
{
    "temporada": 1,
    "numero": 2,
    "assistido": false,
    "serie_id": 1
}

#### Buscar episodios
GET http://localhost:8080/api/episodios
HEADER Authorization: Bearer TOKEN

#### Buscar episodio
GET http://localhost:8080/api/episodios/4
HEADER Authorization: Bearer TOKEN

#### Atualizar Episodio
PUT http://localhost:8080/api/episodios/1
HEADER Authorization: Bearer TOKEN
{
    "temporada": 1,
    "numero": 1,
    "assistido": true,
    "serie_id": 1
}