## Требования

- Docker
- Docker Compose

## Установка и запуск проекта

### 1. Клонирование репозитория

Склонируйте репозиторий на свой локальный компьютер.

```bash
git clone https://github.com/tochiv/whyNot.git
cd your-repository
```

### 2. Запуск Docker контейнеров
```bash
docker-compose up -d
```

### 3. Установка зависимостей

```
docker exec -it laravel_app bash
composer install
```

### 4. Запуск миграций и сидеров

```
php artisan migrate --seed
```

### 5. Установка Swagger

```
composer require darkaonline/l5-swagger
php artisan l5-swagger:publish
```

### 6. Конфигурация Swagger
#### config/l5-swagger.php
```
'docs_json' => 'swagger.json'

'routes' => 
    'docs' => 'docs'
    
'paths' => 
     'docs' => base_path('docs')
```
### 7. Доступ к Swagger UI

```
http://localhost:8080
```

### 8. Доступ к PGAdmin и Redis Commander

PGAdmin:

    URL: http://localhost:5050
    Логин: admin@admin.com
    Пароль: admin

Redis:

    URL: http://localhost:8081
