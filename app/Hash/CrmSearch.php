<?php

namespace App\Hash;


class CategoriesHash extends LiteHash
{
    //
    public static function getFilePath() //функция стремная - не  там вызвал - левое значение
    {   
      return 'api/hash/'.md5('App\Hash\CategoriesHash').'.json';
    }
}
