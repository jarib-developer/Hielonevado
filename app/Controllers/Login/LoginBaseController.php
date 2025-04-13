<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\BlockedIpsModel;
use App\Models\UsersModel;

class LoginBaseController extends BaseController
{
  // DO LOGIN AND DEPENDENCIES
  // DO LOGIN
  public function DoLoginBaseController($UserLoginDAta)
  {
    // Validate No Empty Spaceses On Post Data
    if ($this->ValNoEmptySpaces($UserLoginDAta)) {
      $this->InvalidSubmit();
      return ('/');
    }
    if ($this->UserCanAccess($UserLoginDAta)) {
      return ('/Dashboard');
    } else {
      $this->InvalidSubmit();
      return ('/');
    }
  }

  // ./DO LOGIN
  // DO LOGIN DEPENDIENCIES
  private function InvalidSubmit()
  {
    $actual = session('counter') - 1;
    session()->set('counter', $actual);
  }

  private function ValNoEmptySpaces($UserLoginDAta)
  {
    if ($UserLoginDAta) {
      foreach ($UserLoginDAta as $key => $value) {
        if ($value == null) {
          return true;
        }
      }
    }
  }

  public function UserCanAccess($UserLoginDAta)
  {
    $usersModel = new UsersModel();
    $query = $usersModel->getUserforLogin($UserLoginDAta['nickname']);

    if (is_array($query) && isset($query['password'])) {
      if ($query['password'] !== null) {
        if (password_verify($UserLoginDAta['password'], $query['password'])) {
          // Comparation Ok, Upload UserData On Session
          $this->LoadUserDataOnSession($query['userID']);
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
  }

  public function LoadUserDataOnSession($userID)
  {
    // LOAD HELPER TO ORDER DATA ON SESSION
    helper('OrderData_helper');
    // ./HELPERS
    $usersModel = new UsersModel();
    $query = $usersModel->getUserDataByID($userID);
    session()->set([
      'UserData' => OrderDataForDashboard($query[0]),
      'isLoggedIn' => true
    ]);
    // log_message('debug', 'Sesión: ' . print_r(session()->get(), true));
  }

  // ./DO LOGIN DEPENDIENCIES
  // VALIDATE COUNTER ON SESSION
  private function ValidateSessionCounter()
  {
    if (!session()->has('counter')) {
      session()->set('counter', 5);  // Set inital Attemps allowed
    }
    if (session('counter') == 0) {
      $this->blockIP();
    }
  }
  // HANDLE BLOCKED IPS
  public function isThisIpBlocked()
  {
    $this->ValidateSessionCounter();
    // Load model
    $BlockedIpsModel = new BlockedIpsModel();
    $registro = $BlockedIpsModel->where('ip_address', $this->request->getIPAddress())->first();
    if ($registro) {
      $tiempoTranscurrido = time() - $registro['time'];
      // 24 horas = 86400 segundos
      if ($tiempoTranscurrido >= 86400) {
        // desbloquear
        $BlockedIpsModel->delete($registro['id']);
      } else {
        // sigue bloqueada
        return true;
      }
    }
  }
  private function blockIP()
  {
    $BlockedIpsModel = new BlockedIpsModel();
    $data = [
      'ip_address' => $this->request->getIPAddress(),
      'time' => time(),
    ];
    $BlockedIpsModel->insert($data);
    session()->destroy();
  }
}
