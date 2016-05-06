<?php

/**
 *
 */
class Dashboard extends Controller {

  function __construct() {
    parent::__construct();

    // Session::start();
    // $logged = Session::get('loggedIn');
    // if ($logged == false) {
    //   Session::stop();
    //   header('location: dashboard/login');
    //   exit();
    // }
  }

  public function index() {
    $this->view->render('dashboard/index');
  }

  public function login() {
    $this->view->render('dashboard/login');
  }

  public function logUserIn() {
    echo "logging someone in";
    $this->model->logUserIn();
  }

  public function logout() {
    $this->view->render('dashboard/logout');
  }

  public function registerUser() {
    $this->view->render('dashboard/register');
  }

  public function activateUser($activationCode = false) {
    $this->view->render('dashboard/activate');
  }
}


?>
