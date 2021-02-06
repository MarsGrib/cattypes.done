
# Как развернуть

1. git clone https://github.com/MarsGrib/cattypes.done.git projectName
1. composer install
1. npm install (необязательно)
1. php artisan migrate
1. php artisan db:seed

# Задание

Необходимо создать приложение, которое будет хранить информацию о характеристиках товаров 
и предоставлять возможность администрирования (достаточно обычного CRUD):
- категория
- свойство  (тип: список, диапазон, булево)
- категория свойство значение состояние

1. Для каждой категории выводить список доступных свойств, каждое свойство можно включить и отключить для данной категории
2. Для каждого свойства задать тип: список, диапазон, булево

### Целевое API category (CRUD):
>
GET http://cattypes.done/api/market/category/update?id=2 - получить категорию
>
>
POST http://cattypes.done/api/market/category/update?id=2&name=test - изменить категрию
>
>
POST http://cattypes.done/api/market/category/remove?id=2 - удалить категрию
>
>
POST http://cattypes.done/api/market/category/фвв?name=test - добавить категрию
>

### Целевое API filters:

/api/filter/list - получить список фильтров
/api/filter/run - получить хэш списка результатов по фильтру
/api/filter/results - получить список результатов по хэшу



#### Пример работы API:

/api/filter/list?categoryId=123

>
        [
            {
                "type": "list",
                "code": "brand",
                "name": "Бренд",
                "values": [
                    "HP", "ASUS", "Acer"
                ]
            },
            {
                "type": "range",
                "code": "price",
                "name": "Цена",
                "values": [100, 10000]
            },
            {
                "type": "bool",
                "code": "available",
                "name": "В наличии"
            }
        ]
>


/api/filter/run?available=1&brand[]=HP&brand[]=Sony

    {"resultHash": "asd320dpwefhsdpohzfowfu9osei", cnt: 1231}

/api/filter/results?hash=asd320dpwefhsdpohzfowfu9osei

    [12,32,551,2323]


#### Источник информации о товарах:
https://api.zoomos.by/item/178782?key=api-help 

>
    не совсем понял, как работать с этим API
>


#### Проверка

/api/filter/run?brand[]=sony&brand[]=philips&bluetooth=1 - ищем наушники брендов Sony или Philis и с Bluetooth

/api/filter/result?hash=NNNNNNNNNNNNNNNNNNNNNN - получаем выборку демо продуктов
>
 P.S>   Рендж не проверял, но должен работать.
>


 
