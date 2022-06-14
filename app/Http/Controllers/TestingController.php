<?php


namespace App\Http\Controllers;


use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class TestingController
{
    public function mail()
    {
        $emailPenerima ="widhiantoc@gmail.com";
        $mail = Mail::to($emailPenerima)->send(new TestMail());
        dd($mail);
    }
}
