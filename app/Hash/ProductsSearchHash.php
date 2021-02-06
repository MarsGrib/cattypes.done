<?php

namespace App\Hash;


class ProductsSearchHash extends LiteHash
{
    //
    public static function getFilePath() //функция стремная - не  там вызвал - левое значение
    {   
      return 'api/hash/'.md5('App\Hash\ProductsSearchHash').'.json';
    }
}
