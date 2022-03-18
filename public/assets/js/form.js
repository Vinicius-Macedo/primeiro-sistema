

// FORMULÁRIO

const form = document.querySelector('.form-principal');
const cpf = document.querySelector('.cpf');
const data = document.querySelector('.data');
const nome = document.querySelector('.nome');
const email = document.querySelector('.input.email');
const senha = document.querySelector('.input.password.a');
const senhaNovamente = document.querySelector('.password.b');
const camposSenha = document.querySelectorAll('input.password');

form.addEventListener('submit', (e) => {
  // if (checarFormulario()) {
  //   return true;
  // }

  // else {
  //   e.preventDefault();
  // }

});

// MOSTRAR SENHA

camposSenha.forEach(item => {
  item.parentNode.querySelector('i').addEventListener('click', function (e) {

    if (item.type === 'password') {
      item.parentNode.querySelector('i').className = 'icon fas fa-eye-slash';
      item.type = 'text';
    }

    else {
      item.parentNode.querySelector('i').className = 'icon fas fa-eye';
      item.type = 'password'
    }

  });
});

// CHECAR FORMULÁRIO

function checarFormulario() {

  // checa se estamos na página de cadastro que possui mais campos.
  if (document.querySelector('.form-principal.cadastro') != null) {
    {
      // checar cpf
      if (!checarCPF(cpf.value)) {
        showError(cpf, "Insira um CPF válido.");
        return false;
      }

      else {
        removeError(cpf);
      }

      // checar data
      if (!checarData(data.value)) {
        showError(data, "Insira uma data válida.");
        return false;
      }

      else {
        removeError(data);
      }

      //checar nome
      if (!checarNome(nome.value)) {
        showError(nome, "Insira um nome válido.");
        return false;
      }

      else {
        removeError(nome);
      }


      if (!checarSenhasIguais(senha.value, senhaNovamente.value)) {
        showError(senhaNovamente, "As senhas não são correspondentes. js");
        return false;
      }
      else {
        removeError(senhaNovamente)
      }
    }

    return true;

  }


  //checar email
  if (!checarEmail(email.value)) {
    if (document.querySelector('.form-principal.cadastro.') != null) {
      showError(email, "Insira um email válido.");
      return false;
    }

    else {
      removeError(email);
    }
  }

  else {
    removeError(email);
  } 

  //checar senha
  if (!checarSenha(senha)) {
    if (document.querySelector('.form-principal.cadastro') != null) {
      showError(senha, "Escolha um senha forte com caracteres e números.");
    }

    else {
      removeError(senha);
    }
    
  }

  else {
    removeError(senha)
  }



}

// MENSAGENS DE ERRO

function showError(input, messagem) {
  let spanError = input.parentNode.querySelector("span.error");

  spanError.classList.add("active");
  spanError.innerHTML = messagem;
}

function removeError(input) {
  let spanError = input.parentNode.querySelector("span.error");

  spanError.classList.remove("active");
  spanError.innerHTML = "";
}

////// TESTES DE ERRO

// TESTE CPF

function checarCPF(strCPF) {

 
  strCPF = strCPF.replace(/\.|-/g, '');
  var Soma;
  var Resto;
  Soma = 0;
  if (strCPF == "00000000000" || strCPF.length != 11) return false;

  for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11)) Resto = 0;
  if (Resto != parseInt(strCPF.substring(9, 10))) return false;

  Soma = 0;
  for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
  Resto = (Soma * 10) % 11;

  if ((Resto == 10) || (Resto == 11)) Resto = 0;
  if (Resto != parseInt(strCPF.substring(10, 11))) return false;
  return true;
}

// CHECAR DATA

function checarData(data) {

  data = transformarEmData(data);

  let today = new Date();
  let dataMaxima = Date.parse(today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate());
  let dataMinima = Date.parse("1900/01/01"); // yyyy-mm-dd
  let dataFormato = new Date(data);

  if (data.length != 10) {
    return false
  }

  if (Date.parse(data) > dataMaxima || Date.parse(data) < dataMinima) {
    return false;
  }

  return dataFormato instanceof Date && !isNaN(dataFormato.valueOf());

}

function transformarEmData(data) {
  var dia = data.split("/")[0];
  var mes = data.split("/")[1];
  var ano = data.split("/")[2];
  data = ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);
  return data;
}

// CHECAR NOME COMPLETO

function checarNome(nome) {
  if (nome.length < 5 || nome.length > 197) {
    return false;
  }

  var re = /[0123456789`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  return !re.test(nome);
}

// CHECAR EMAIL

function checarEmail(email) {
  let re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function checarSenha(senha) {

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if (!(lowerCaseLetters.test(senha.value))) { 
    return false;
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (!(upperCaseLetters.test(senha.value))) {
    return false;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (!(numbers.test(senha.value))) { 
    return false;
  }

  // Validate length
  if (senha.value.length < 7) { 
    return false;
  }

  return true;

}

function checarSenhasIguais(senha1,senha2) {
  if (senha1 == senha2) {
    return true;
  }
  return false;
}

// FORMATAR CPF
function mascara(i) {

  var v = i.value;

  if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";

}

//FORMATAR DATA
function mascara2(i) {

  var d = i.value;

  if (isNaN(d[d.length - 1])) {
    i.value = d.substring(0, d.length - 1);
    return;
  }

  i.setAttribute("maxlength", "10");
  if (d.length == 2 || d.length == 5) i.value += "/";
}