<?php

class Cadastro extends Controller
{


  public function __construct()
  {
    $this->cadastroModel = $this->model('CadastroModel');
  }

  public function index()
  {

    // TODOS OS INDEXES => TRUE PARA SER ENVIADO AO BANCO DE DADOS
    $formFields = [];

    // CHECA E RETIRA OS ESPAÇOS DE TODOS OS INPUTS
    $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
    if (isset($form)) :
      $infos = [
        'cpf' => trim($form['cpf']),
        'date' => trim($form['date']),
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => $form['password'],
        'passwordConfirm' => $form['passwordConfirm'],
      ];

      // VALIDA OS INPUTS, CASO ELES PASSEM NO TESTE
      if (!CheckForm::cpf($infos['cpf'])) :
        $infos['cpf_error'] = 'Insira um CPF válido';
        $formFields[0] = false;
        $infos['cpf_sql'] = '';
      elseif ($this->cadastroModel->checkCpfExists($infos['cpf'])) :
        $infos['cpf_error'] = 'Esse CPF já foi cadastrado';
        $formFields[0] = false;
        $infos['cpf_sql'] = '';
      else :
        $infos['cpf_error'] = '';
        $infos['cpf_sql'] = CheckForm::cpfSql($infos['cpf']);
        $formFields[0] = true;
      endif;

      if (!CheckForm::date($infos['date'])) :
        $infos['date_error'] = 'Insira uma data válida';
        $formFields[1] = false;
        $infos['date_sql'] = '';
      else :
        $infos['date_error'] = '';
        $formFields[1] = true;
        $infos['date_sql'] = CheckForm::dateSql($form['date']);
      endif;

      if (!CheckForm::name($infos['name'])) :
        $infos['name_error'] = 'Insira um nome válido';
        $formFields[2] = false;
      else :
        $infos['name_error'] = '';
        $formFields[2] = true;
      endif;

      if (!CheckForm::email($infos['email'])) :
        $infos['email_error'] = 'Insira um email válido';
        $formFields[3] = false;
      elseif ($this->cadastroModel->checkEmailExists($infos['email'])) :
        $infos['email_error'] = 'Esse email já foi cadastrado';
        $formFields[3] = false;
        $infos['cpf_sql'] = '';
      else :
        $infos['email_error'] = '';
        $formFields[3] = true;
      endif;

      if (!CheckForm::password($infos['password'])) :
        $infos['password_error'] = 'A senha deve ter no mínimo 8 digitos com letras e números.';
        $infos['password_sql'] = '';
        $formFields[4] = false;
      else :
        $infos['password_error'] = '';
        $infos['password_sql'] = CheckForm::passwordSql($infos['password']);
        $formFields[4] = true;
      endif;

      if (!CheckForm::passwordConfirm($infos['password'], $infos['passwordConfirm'])) :
        $infos['passwordConfirm_error'] = 'As senhas não correspondem';
        $formFields[5] = false;
      else :
        $infos['passwordConfirm_error'] = '';
        $formFields[5] = true;
      endif;


    else :
      $infos = [
        'cpf' => '',
        'date' => '',
        'date_sql' => '',
        'name' => '',
        'email' => '',
        'password' => '',
        'passwordConfirm' => '',
        'cpf_error' => '',
        'date_error' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'passwordConfirm_error' => '',
      ];
    endif;


    // CHECA SE TOODOS OS CAMPOS DO ARRAY SÃO TRUE E ARMAZENA NO BANCO DE DADOS
    if (count(array_keys($formFields, 'false')) == count($formFields) && !empty($formFields) ) :
      $this->cadastroModel->store($infos);
    endif;

    $this->view('Templates/headOnly');
    $this->view('Pages/cadastro', $infos);
    $this->view('Templates/footerScriptForm');
  }
}
