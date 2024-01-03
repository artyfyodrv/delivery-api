### Простенький API проект по курьерской доставке на Laravel 10
### [Документация API](https://documenter.getpostman.com/view/24975823/2s9YsFEuTS)
---
## Как запустить проект?

#### Необходимое окружение
- Docker и "make" для работы с Makefile

#### Запуск
- Клонируем проект с репозитория командой по HTTPS или SSH  <br>
`git clone https://github.com/artyfyodrv/delivery-api.git` <br>
`git clone git@github.com:artyfyodrv/delivery-api.git` 
- Запускаем команду `make build install`
- Настраиваем подключение к БД в .env 
```
DB_CONNECTION=mysql
DB_HOST=mysql_delivery
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=12345
DB_ROOT_PASSWORD=12345
```
- Выполняем команду `make migrate`
---


