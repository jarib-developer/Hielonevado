<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Main Login
$routes->get ('/', 'Login\Login::LoginForm');
$routes->post('/', 'Login\Login::LoginForm');
$routes->post('/access', 'Login\Login::doLogin');
$routes->get ('/logout','Login\Login::LogOut',['filter' => 'auth']);
// Blocked Ip
$routes->get ('BlockedIp', 'Login\Login::BlockedIpView');
// DashBboard
$routes->group('Dashboard', ['filter' => 'auth'], function ($routes) {
  $routes->get  ('/', 'Dashboard::index');
});
// LandLords
$routes->group('Landlords', ['filter' => 'auth'], function ($routes) {
  $routes->get  ('/', 'Landlords\Landlords::list');
  $routes->get  ('Add', 'Landlords\Landlords::Add');
  $routes->post ('Add/Action', 'Landlords\Landlords::AddAction');
  $routes->post ('View', 'Landlords\Landlords::View');
  $routes->post ('Edit', 'Landlords\Landlords::Edit');
});