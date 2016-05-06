<?php

/**
 *
 */
class Dashboard extends Controller {

  function __construct() {
    parent::__construct();

    // $logged = $this->session->getLoggedIn();
    // if ($logged == false) {
    //   $this->session->logout();
    //   header('location: login.php');
    //   exit();
    // }

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

  public function sign_in() {
    echo "logging someone in";
    $this->model->sign_in();
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
