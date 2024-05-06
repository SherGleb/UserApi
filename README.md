## Создание первого пользователя
Переходим по адресу http://userapi/register и регистрируем первоначального пользователя

## Использование методов API
### Авторизация пользователя

`POST:` `userapi/api/login `

Запрос:
```json
{
"email": "example@gmail.com", 
"password": "12345678"
}
```

Ответ:
```json
{
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdXNlcmFwaS9hcGkvbG9naW4iLCJpYXQiOjE3MTQ5NDYwMTMsImV4cCI6MTcxNDk2NDAxMywibmJmIjoxNzE0OTQ2MDEzLCJqdGkiOiJJZFI4Q1lRZDdKNGo3bHJmIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.6F5omgcervrTRLI0JYMmL_YCs0MrwAnu0e5-hCqebV0"
}
```

>Замечание
>В следующих методах при отправках запросов используется полученный ранее jwt-token
### Выход пользователя

`POST:` `userapi/api/logout` 

Запрос:
```json
{

}
```

Ответ:
```json
{
    "message": "Successfully logged out"
}
```

### Получение информации о всех пользователях

`GET:` `userapi/api/users`

Ответ:
```json
{
    {
        "id": 2,
        "name": "Sasha",
        "email": "efg@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-05-05T21:36:49.000000Z",
        "updated_at": "2024-05-05T21:36:49.000000Z"
    },
    {
        "id": 7,
        "name": "Masha",
        "email": "efghy@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-05-05T22:20:48.000000Z",
        "updated_at": "2024-05-05T22:20:48.000000Z"
    }
}
```

### Получение информации о конкретном пользователе по его id

`GET:` `userapi/api/users/{id}`

Ответ:
```json
{
        "id": 2,
        "name": "Sasha",
        "email": "efg@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-05-05T21:36:49.000000Z",
        "updated_at": "2024-05-05T21:36:49.000000Z"
    }
```

### Создание нового пользователя

`POST:` `userapi/api/users`

Запрос:
```json
{
	"name": "Masha",
    "email": "efghy@gmail.com",
    "password": "12345678",
    "updated_at": "",
    "created_at": ""
}
```

Ответ:
```json
{
    "name": "Masha",
    "email": "efghy@gmail.com",
    "updated_at": "2024-05-05T22:20:48.000000Z",
    "created_at": "2024-05-05T22:20:48.000000Z",
    "id": 7
}
```

### Изменение информации о пользователе

`PUT:` `userapi/api/users/{id}`

Запрос:
```json
{
	"name": "Pasha"
}
```

Ответ:
```json
{
    "id": 5,
    "name": "Pasha",
    "email": "efghy@gmail.com",
    "email_verified_at": null,
    "created_at": "2024-05-05T21:55:02.000000Z",
    "updated_at": "2024-05-05T21:57:09.000000Z"
}
```

### Удаление пользователя

`DELETE:` `userapi/api/users/{id}`
