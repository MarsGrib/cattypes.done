<?php

namespace App\Hash;

use Illuminate\Support\Facades\Storage;


/*
* Редис и пр. я пока не использовал поэтому будет пока так
*
*/

class LiteHash  
{
    
    public static function getFilePath() //функция стремная - не  там вызвал - левое значение
    {        
        $trace = debug_backtrace();
        //dd('api/hash/'.md5($trace[2]['class']).'.json');
        return 'api/hash/'.md5($trace[2]['class']).'.json';
    }

    public static function getHashKey($keyName=null,$value=null)
    {
        if($keyName==null)  return null;
       
            $filePath=static::getFilePath();
            try {
                $data=json_decode(Storage::disk('local')->get($filePath));
            } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $th) {
                $data =new \StdClass();
                $data->$keyName=$value;
                Storage::disk('local')->put($filePath, json_encode($data));
            }
            return (is_object($data)) ? $data->$keyName : $value;                     
    }

    public static function setHashKey($keyName,$value=null)
    {
        $filePath=static::getFilePath();
        try {
            $data=json_decode(Storage::disk('local')->get($filePath));
        } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $th) {
           $data =new \StdClass(); //заменить на кастумный експшон
        }
        if(!is_object($data))
        {
            $data =new \StdClass();
        }
        $data->$keyName=$value;
        
        Storage::disk('local')->put($filePath, json_encode($data));
        return true;
    }
}
