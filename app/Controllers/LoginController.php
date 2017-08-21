<?php

namespace App\Controllers;

use App\Core\Request;


use App\Models\LoginUser;

class LoginController
{
    const ADMIN_GROUP = 1;
    const REGION_GROUP = 2;

    private $user;

    /**
     * LoginController constructor.
     */
    public function __construct(){
        $this->user = new LoginUser();
    }

    /**
     * @return mixed
     */
    public function viewLogin()
    {
        return view('viewLogin');
    }

    /**
     * @return mixed
     */
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