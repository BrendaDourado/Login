<h1>Cadastrar Usuário</h1>
<form action="?page=salvar" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control">
	</div>
	<div class="mb-3">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="mb-3">
		<label>Senha</label>
		<input type="password" name="senha" class="form-control">
	</div>
	<div class="mb-3">
		<label>Tipo</label>
		<select name="tipo" class="form-control">
			<option>-Escolha-</option>
			<option value="1">Administrador</option>
			<option value="2">Usuário Comum</option>
		</select>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>