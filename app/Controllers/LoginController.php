<?php

namespace App\Controllers;

use App\Core\Request;


use App\Models\LoginUser;

class LoginController
{
    const ADMIN_GROUP = 1;
    const REGION_GROUP = 1;

    private $user;

    public function __construct(){
        $this->user = new LoginUser();
    }

    public function viewLogin()
    {
        return view('viewLogin');
    }

    public function Login()
    {
        if (Request::is('POST')) {

            $this->user->user_name = Request::get('name');
            $this->user->password = Request::get('password');

            $loggedInUser = $this->user->login();

            if ($loggedInUser == null) {
                return view('viewLogin', ['errors' => 'User have  not registered']);
            } else {
                if ($loggedInUser['group_id'] == self::ADMIN_GROUP) {
                    return view('productView');
                } else {
                    return view('productViewRegion');
                }
            }
        }
    }
}