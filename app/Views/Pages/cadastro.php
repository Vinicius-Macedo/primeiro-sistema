

<section class="hero-section">
  <div class="form-container">
    <h2 class="h2-title">Cadastro</h2>
    <form name="form" action="<?= URL ?>cadastro" method="POST" class="form-principal cadastro" novalidate>

      <div class="field-container">
        <input id="cpf" value="<?= $infos['cpf'] ?>" oninput="mascara(this)" required type="text" class="input cpf" name="cpf">
        <label>CPF</label>
        <span class="error <?= $infos['cpf_error'] ? 'active' : '' ?>"><?= $infos['cpf_error'] ?></span>
      </div>

      <div class="field-container">
        <input id="date" value="<?= $infos['date'] ?>" class="input data" oninput="mascara2(this)" required type="text" name="date">
        <label>Data de nascimento (dd/mm/aaaa)</label>
        <span class="error <?= $infos['date_error'] ? 'active' : '' ?>"><?= $infos['date_error'] ?></span>
      </div>

      <div class="field-container">
        <input id="name" value="<?= $infos['name'] ?>" class="input nome" required type="text" name="name">
        <label>Nome Completo</label>
        <span class="error <?= $infos['name_error'] ? 'active' : '' ?>"><?= $infos['name_error'] ?></span>
      </div>

      <div class="field-container">
        <input id="email" value="<?= $infos['email'] ?>" class="input email" required type="email" name="email">
        <label>Email</label>
        <span class="error <?= $infos['email_error'] ? 'active' : '' ?>"><?= $infos['email_error'] ?></span>
      </div>

      <div class="field-container">
        <input id="password" value="<?= $infos['password'] ?>" class="input password a" required type="password" name="password">
        <i class="icon fas fa-eye"></i>
        <label>Senha</label>
        <span class="error <?= $infos['password_error'] ? 'active' : '' ?>"><?= $infos['password_error'] ?></span>
      </div>

      <div class="field-container">
        <input id="passwordConfirm" value="<?= $infos['passwordConfirm'] ?>" class="input password b" required type="password" name="passwordConfirm">
        <label>Confirmação da Senha</label>
        <i class="icon fas fa-eye"></i>
        <span class="error <?= $infos['passwordConfirm_error'] ? 'active' : '' ?>"><?= $infos['passwordConfirm_error'] ?></span>
      </div>

      <input class="btn primary" type="submit" value="Cadastrar">
    </form>
    <a class="comeback" href="home">voltar</a>
  </div>
</section>