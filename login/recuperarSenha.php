<h1> Recuperar senha</h1>
<form action="recuperar.php" method="POST">
<div class="mb-3">
    <h3>Para recuperar a senha informe o E-mail Cadastrado</h3>
		<label>Email </label>
		<input type="email" name="email" class="form-control">
        <div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	    </div>
	</div>
</form>

<!-- verificar no banco se há este email
// informar o usuário que caso exista foi enviado o link para redefinição de senha
// enviar o email com link para recuperação 
//criar uma tela para redefinição de senha 
// -- com uma query url de update -->