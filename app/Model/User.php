<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public static function getByToken($token)
    {
        return DB::table('users')
            ->where('token', '=', $token)
            ->first();
    }

    public static function createNew($userData)
    {
        return DB::table('users')->insert($userData);
    }

    public static function getByEmailConfirmToken($emailConfirmToken)
    {
        return DB::table('users')
            ->select('*')
            ->where('email_confirm_token', '=', $emailConfirmToken)
            ->first();
    }

    public static function setUserToActive($idUser)
    {
        return DB::table('users')
            ->where('id','=',$idUser)
            ->update(['active'=>'Y']);

    }


}
