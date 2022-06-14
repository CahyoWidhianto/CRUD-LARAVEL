<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    public static function getByPrimaryKey($id)
    {
        return DB::table('products')
            ->where('id','=', $id)
            ->first();
    }

    public static function getByCode($code)
    {
        return DB::table('products')
            ->where('code','=', $code)
            ->first();
    }

}
