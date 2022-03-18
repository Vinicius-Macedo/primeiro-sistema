<?php

class Login extends Controller
{
  public function __construct()
  {
    $this->loginModel = $this->model('LoginModel');
  }

  public function index()
  {

    $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
    if (isset($form)) :
     
      $infos = [
        'email' => trim($form['email']),
        'password' => $form['password'],
      ];
      
      if (!CheckForm::email($infos['email'])) :
        $infos['email_error'] = 'Insira um email válido';
      elseif ($user = $this->loginModel->checkLogin($infos['email'], $form['password'])) :
        $this->startSession($user);
        $infos['email_error'] = '';
      else :
        $infos['email_error'] = 'Email ou senha incorretos.';
      endif;

    else :
      $infos = [
        'email' => '',
        'password' => '',
        'email_error' => '',
        'password_error' => '',
      ];
    endif;

   

    $this->view('Templates/headOnly');
    $this->view('Pages/login', $infos);
    $this->view('Templates/footerScriptForm');
  }

  private function startSession($user)
  {
    $_SESSION['usuario_email'] = $user;
    echo '<hr>';
    print_r($_SESSION);
  }
}

