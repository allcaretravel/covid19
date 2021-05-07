<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{

// class Register extends Model
// {

    use HasFactory;

    protected $table = "users";

    public static function formstore($data){

        $username   =   Input::get('username');
        $email      =   Input::get('email');
        $pass       =   Hash::make(Input::get('password'));

        $users  =   new Register();
        $users->name=$username;
        $users->email=$email;
        $users->password=$pass;

        $users->save();

    }
}
