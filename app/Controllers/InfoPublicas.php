<?php 

class infoPublicas extends Controller {

  public function index() {
    $this->view('Templates/header', ['titulo' => 'Informações Públicas']);
    $this->view('Pages/infoPublicas');
    $this->view('Templates/footer');
  }

}