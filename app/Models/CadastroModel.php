<?php

class CadastroModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function store($infos)
  {

    $this->db->prepare("INSERT INTO  usuarios (cpf, nascimento, email, nome, senha) VALUES (:cpf, :nascimento, :email, :nome, :senha)");

    $this->db->bindValue(':cpf', $infos['cpf_sql']);
    $this->db->bindValue(':nascimento', $infos['date_sql']);
    $this->db->bindValue(':email', $infos['email']);
    $this->db->bindValue(':nome', $infos['name']);
    $this->db->bindValue(':senha', $infos['password_sql']);

    $this->db->execute();


  }

  public function checkEmailExists($email)
  {
    $this->db->prepare("SELECT email FROM usuarios WHERE email = :email");
    $this->db->bindValue(":email", $email);

    if($this->db->fetch()):
      return true;
    else:
      return false;
    endif;
  }

  public function checkCpfExists($cpf)
  {
    $cpf = str_replace(['.', '-'], '', $cpf);

    $this->db->prepare("SELECT cpf FROM usuarios WHERE cpf = :cpf");
    $this->db->bindValue(":cpf", $cpf);

    if($this->db->fetch()):
      return true;
    else:
      return false;
    endif;
  }

}
