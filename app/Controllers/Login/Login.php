<?php

namespace App\Controllers\Login;

class Login extends LoginBaseController
{
    public function LoginForm()
    {
        // VALIDATE IP ITS CLEAR TO ACCESS
        if ($this->isThisIpBlocked()) {
            return redirect()->to('/BlockedIp');
        }
        //-----------------------------------------
        // BIULD VIEW
        $ViewData = array(
            'SessionCounter' => session('counter'),
        );
        return view('Login/loginForm',$ViewData);
        // ./BIULD VIEW
    }

    public function doLogin()
    {
        return redirect()->to($this->DoLoginBaseController($this->request->getPost())); 
    }

    public function BlockedIpView()
    {
      $ViewData = array(
        'thisMachineIP' => $this->request->getIPAddress(),
      );
      return view('Login/BlockedIp', $ViewData);
    }

    public function LogOut(){
        session()->destroy(); // elimina toda la sesión
        return view('Login/LogOut');
    }
    
}
