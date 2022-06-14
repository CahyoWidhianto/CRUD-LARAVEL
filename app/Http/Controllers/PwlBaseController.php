<?php


namespace App\Http\Controllers;


use App\Model\User;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

abstract class PwlBaseController extends Controller
{
    private $User;

    public function __construct()
    {
        $this->middleware(function ($requests, $next) {
            $token = session('token');
            $user = User::getByToken($token);
            if ($user === null) {
                Redirect::to(route('login.index'))->send();
                exit;
            }
            $this->User = $user;
            return $next($requests);
        });

    }

    public function getIdUser()
    {
        return $this->User->id;
    }

    public function isSuperAdmin()
    {
        $result =false;
        if ($this->User->role == 'superadmin'){
            $result=true;
        }
        return $result;
    }

    public function onlySuperAdmin()
    {
        if($this->User->role !== 'superadmin'){
            throw new AccessDeniedHttpException();
        }
    }
}
