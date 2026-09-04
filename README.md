# Task Manager API

Simple Task Manager API built using Laravel 13 and MySQL.

## Setup

Clone the project and install dependencies:

```bash
composer install
```

Copy `.env.example` to `.env` and set the database details:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

Generate the application key:

```bash
php artisan key:generate
```

Run the migration:

```bash
php artisan migrate
```

Start the server:

```bash
php artisan serve
```

API URL:

```text
http://127.0.0.1:8000/api
```

## APIs

### Create Task

```text
POST /api/tasks
```

Body:

```json
{
    "title": "Learn Laravel",
    "description": "Complete Laravel assignment",
    "is_completed": false
}
```

### Get Tasks

```text
GET /api/tasks
```

### Update Task

```text
PUT /api/tasks/{id}
```

Body:

```json
{
    "title": "Learn Laravel 13",
    "description": "Complete task manager",
    "is_completed": true
}
```

### Delete Task

```text
DELETE /api/tasks/{id}
```

## Validation

`title` is required.

`description` is optional.

`is_completed` must be a boolean.

Example:

```json
{
    "title": "Test task",
    "description": "Testing API",
    "is_completed": false
}
```

## Postman

The Postman collection is included in the project:

```text
task-manager.postman_collection.json
```

Import the collection into Postman and run the requests.

## Database

SQL file:

```text
task-manager.sql
```

The database contains the `tasks` table with:

```text
id
title
description
is_completed
created_at
updated_at
```

## Project

```text
app/
├── Http/Controllers/
│   └── TaskController.php
└── Models/
    └── Task.php

database/
└── migrations/

routes/
└── api.php

task-manager.postman_collection.json
task-manager.sql
README.md
```
