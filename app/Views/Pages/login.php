<section class="hero-section">
  <div class="form-container">
    <h2 class="h2-title">Seja bem vindo</h2>
    <form name="form" action="<?= URL ?>login" method="POST" class="form-principal" novalidate>
      <div class="field-container">
      <input id="email" value="<?= $infos['email'] ?>" class="input email" required type="email" name="email">
        <label>Email</label>
        <span class="error <?= $infos['email_error'] ? 'active' : '' ?>"><?= $infos['email_error'] ?></span>
      </div>
      <div class="field-container">
      <input id="password" value="<?= $infos['password'] ?>" class="input password a" required type="password" name="password">
        <i class="icon fas fa-eye"></i>
        <label>Senha</label>
        <i class="icon fas fa-eye"></i>
        <span class="error"></span>
      </div>
      <input class="btn primary" type="submit" value="Entrar">
    </form>
    <a class="comeback" href="home">voltar</a>
  </div>
</section>