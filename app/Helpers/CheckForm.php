<?php

class CheckForm
{

  public static function cpf($cpf)
  {
    $cpf = str_replace(['.', '-'], '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
    }

    for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
      }

      $d = ((10 * $d) % 11) % 10;

      if ($cpf[$c] != $d) {
        return false;
      }
    }

    return true;
  }

  public static function cpfSql($cpf)
  {
    $cpf = str_replace(['.', '-'], '', $cpf);
    return $cpf;
  }

  public static function date($date)
  {
    if (strlen($date) != 10) :
      return false;
    endif;

    $date = array_map('intval', explode('/', $date));
    $infos['date_sql'] = $date[2] . '-' . $date[1] . '-' . $date[0];
    $currentDate = date("m/d/Y");
    $currentDate = strtotime($currentDate);
    $OldestDate = strtotime('01/01/1902');

    if (checkdate($date[1], $date[0], $date[2])) :
      $date = strtotime($date[1] . '/' . $date[0] . '/' . $date[2]);

      if ($date < $currentDate && $date > $OldestDate) :
        return true;
      else :
        return false;
      endif;

    else :
      return false;
    endif;
  }

  public static function dateSql($date)
  {
    $date = array_map('intval', explode('/', $date));
    $date = $date[2] . '-' . $date[1] . '-' . $date[0];
    return $date;
  }

  public static function name($name)
  {
    if (strlen($name) > 4 && strlen($name) < 256 && !(preg_match('#[^\p{L}\s-]#u', $name))) :
      return true;
    else :
      return false;
    endif;
  }

  public static function email($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function password($password)
  {

    $number = preg_match('@[0-9]@', $password);

    if (strlen($password) < 7 || !$number) :
      return false;
    else :
      return true;
    endif;

    // // Senha forte com letras minúsculas, maiúsculas e números
    // $number = preg_match('@[0-9]@', $password);
    // $uppercase = preg_match('@[A-Z]@', $password);
    // $lowercase = preg_match('@[a-z]@', $password);

    // if (strlen($password) < 7 || !$number || !$uppercase || !$lowercase) :
    //   return false;
    // else :
    //   return true;
    // endif;
  }

  public static function passwordSql($password)
  {
    $password = password_hash($password, PASSWORD_DEFAULT);
    return $password;
  }

  public static function passwordConfirm($password, $passwordConfirm)
  {
    if ($password == $passwordConfirm) :
      return true;
    else :
      return false;
    endif;
  }
}
