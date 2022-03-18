<?php

class Controller
{
  
  public function model($model)
  {
    require_once MODELS_FOLDER . $model . '.php';
    return new $model;
  }

  public function view($view, $infos = [])
  {
    $file = (VIEWS_FOLDER . $view . '.php');
    if (file_exists($file)) :
      require_once $file;
    else:
      die('O arquivo de view não existe!');
    endif;
  }
  
  public function notfound()
  {
    $this->view('Templates/header', ['titulo' => 'Página não encontrada']);
    $this->view('Pages/404');
  }
}
