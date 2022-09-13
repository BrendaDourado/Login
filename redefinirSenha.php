<?php
  $token=$_GET['token'];
?>


<h1> Redefinição de senha </h1>

<form action="confirmarSenha.php" method="POST">
 
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <div class="mb-3">
		<label>Nova Senha</label>
		<input onchange="onChange()" type="password" name="senha" class="form-control">
    </div>

    <div class="mb-3">
		<label>Confirmar Nova Senha</label>
		<input onchange="onChange()" type="password" name="novaSenha" class="form-control">

    <button id="btn-submit" class="button" type="submit"> ENVIAR </button>
    <div id="confereSenhas" style="display:none">
      Senhas não conferem
    </div>
    </div>
</form>
<script>
  function onChange () {
  const password = document.querySelector('input[name=senha]');
  const confirm = document.querySelector('input[name=novaSenha]');
  if (confirm.value !== password.value) {
    document.querySelector('#btn-submit').disabled = true
    document.querySelector('#confereSenhas').style.display="block"

  } else {
    document.querySelector('#btn-submit').disabled = false
    document.querySelector('#confereSenhas').style.display="none"
  }
}
</script>