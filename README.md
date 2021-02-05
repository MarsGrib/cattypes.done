## Характеристики товаров
Необходимо создать приложение, которое будет хранить информацию о характеристиках товаров 
и предоставлять возможность администрирования (достаточно обычного CRUD):
- категория
- свойство  (тип: список, диапазон, булево)
- категория свойство значение состояние



1. Для каждой категории выводить список доступных свойств, каждое свойство можно включить и отключить для данной категории
2. Для каждого свойства задать тип: список, диапазон, булево

### Целевое API:

/filter/list - получить список фильтров
/filter/run - получить хэш списка результатов по фильтру
/filter/results - получить список результатов по хэшу

#### Источник информации о товарах:
https://api.zoomos.by/item/178782?key=api-help

Пример работы API:

/filter/list?categoryId=123
<<<<<<< HEAD

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

=======
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
>>>>>>> 558ee7ba1ff4b774f6b701b4b6514188c1dd539b

/filter/run?available=1&brand[]=HP

    {"resultHash": "asd320dpwefhsdpohzfowfu9osei", cnt: 1231}

/filter/results?hash=asd320dpwefhsdpohzfowfu9osei

    [12,32,551,2323]
