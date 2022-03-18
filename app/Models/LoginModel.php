<?php

class LoginModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function checkLogin($email, $password)
  {
    $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $this->db->bindValue(":email", $email);

    // IFS DESNECESSÁRIOS PARA CORRIGIR O PROBLEMA DO TEMPO DE RESPOSTA
    if ($this->db->fetch()) :
      $user = $this->db->fetch();
      if (password_verify($password, $user->senha)) :
        return $user;
      else :
        return false;
      endif;
    else :
      $user = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWX';
      if (password_verify($password, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWX')) :
        return false;
      else :
        return false;
      endif;
    endif;
  }
}
